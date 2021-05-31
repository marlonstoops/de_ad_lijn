<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsValidMessage implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $message = config('messages.' . $value);

        return $message ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid message';
    }
}
