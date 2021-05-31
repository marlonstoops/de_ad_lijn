<?php

namespace App\Notifications\Messages;

class SmsMessage
{
    public $message;

    public function __toString()
    {
        return $this->message;
    }

    public function message($message)
    {
        $this->message = $message;

        return $this;
    }
}
