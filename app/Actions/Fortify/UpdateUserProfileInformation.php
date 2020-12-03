<?php

namespace App\Actions\Fortify;

use App\Rules\Mobile;
use Illuminate\Validation\Rule;
use App\Contracts\MustVerifyMobile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name'   => ['required', 'string', 'max:255'],
            'email'  => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'mobile' => ['required', 'string', new Mobile, Rule::unique('users')->ignore($user->id)],
            'photo'  => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateEmailVerifiedUser($user, $input);
        } elseif ($input['mobile'] !== $user->mobile &&
            $user instanceof MustVerifyMobile) {
            $this->updateMobileVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name'  => $input['name'],
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     */
    protected function updateEmailVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name'              => $input['name'],
            'email'             => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     */
    protected function updateMobileVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name'               => $input['name'],
            'mobile'             => $input['mobile'],
            'mobile_verified_at' => null,
        ])->save();

        $user->sendMobileVerificationNotification();
    }
}
