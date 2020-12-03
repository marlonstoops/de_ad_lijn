<?php

namespace App\Traits;

use App\Notifications\VerifyMobile;

trait MustVerifyMobile
{
    /**
     * Determine if the user has verified their mobile number.
     *
     * @return bool
     */
    public function hasVerifiedMobile()
    {
        return ! is_null($this->mobile_verified_at);
    }

    /**
     * Mark the given user's mobile as verified.
     *
     * @return bool
     */
    public function markMobileAsVerified()
    {
        return $this->forceFill([
            'mobile_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Send the mobile verification notification.
     */
    public function sendMobileVerificationNotification()
    {
        $this->notify(new VerifyMobile);
    }

    /**
     * Get the mobile address that should be used for verification.
     *
     * @return string
     */
    public function getMobileForVerification()
    {
        return $this->mobile;
    }
}
