<?php

namespace App\Channels;

use Twilio\Rest\Client;
use Illuminate\Notifications\Notification;

class SmsChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);

        // Send notification to the $notifiable instance...

        $id    = config('twilio.id');
        $token = config('twilio.token');

        $client = new Client($id, $token);

        $client->messages->create(
        // the number you'd like to send the message to
        $notifiable->getMobileForVerification(),
            [
                // A Twilio phone number you purchased at twilio.com/console
                'from' => config('twilio.number'),
                // the body of the text message you'd like to send
                'body' => $message,
            ]
        );
    }
}
