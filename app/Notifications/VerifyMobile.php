<?php

namespace App\Notifications;

use App\Models\ShortUrl;
use App\Channels\SmsChannel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use App\Notifications\Messages\SmsMessage;
use Illuminate\Notifications\Notification;

class VerifyMobile extends Notification
{
    /**
     * The callback that should be used to create the verify mobile URL.
     *
     * @var null|\Closure
     */
    public static $createUrlCallback;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var null|\Closure
     */
    public static $toSmsCallback;

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     *
     * @return array|string
     */
    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toSms($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toSmsCallback) {
            return call_user_func(static::$toSmsCallback, $notifiable, $verificationUrl);
        }

        return $this->buildMailMessage($verificationUrl);
    }

    /**
     * Set a callback that should be used when creating the mobile verification URL.
     *
     * @param  \Closure  $callback
     */
    public static function createUrlUsing($callback)
    {
        static::$createUrlCallback = $callback;
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     */
    public static function toSmsUsing($callback)
    {
        static::$toSmsCallback = $callback;
    }

    /**
     * Get the verify mobile notification mail message for the given URL.
     *
     * @param  string  $verificationUrl
     * @param mixed $url
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new SmsMessage())
            ->message($url);
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     *
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        if (static::$createUrlCallback) {
            $url = call_user_func(static::$createUrlCallback, $notifiable);
        } else {
            $url = URL::temporarySignedRoute(
                'verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id'   => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getMobileForVerification()),
                ]
            );
        }

        // Create a short url object
        $url = ShortUrl::create(compact('url'));

        // Return the generated short url
        return $url->short_url;
    }
}
