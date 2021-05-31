<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotOwnMobile implements Rule
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
        if (! \Auth::user()) {
            return false;
        }

        return $value !== \Auth::user()->mobile;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Can\'t call yourself.';
    }
}
