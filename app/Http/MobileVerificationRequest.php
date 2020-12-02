<?php

namespace App\Http;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Http\FormRequest;

class MobileVerificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (! hash_equals(
            (string) $this->route('id'),
            (string) $this->user()->getKey()
        )) {
            return false;
        }

        if (! hash_equals(
            (string) $this->route('hash'),
            sha1($this->user()->getMobileForVerification())
        )) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

    /**
     * Fulfill the mobile verification request.
     */
    public function fulfill()
    {
        if (! $this->user()->hasVerifiedMobile()) {
            $this->user()->markMobileAsVerified();

            event(new Verified($this->user()));
        }
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     */
    public function withValidator($validator)
    {
        return $validator;
    }
}
