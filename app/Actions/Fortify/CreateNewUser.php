<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Rules\Mobile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile'   => ['required', 'string', new Mobile, 'unique:users', 'exists:ad_lijnen'],
            'password' => $this->passwordRules(),
        ], [
            'mobile.exists' => 'You should get a call first before you are able to register.',
        ])->validate();

        $user = User::create([
            'name'     => $input['name'],
            'email'    => $input['email'],
            'mobile'   => $input['mobile'],
            'password' => Hash::make($input['password']),
            'credit'   => 3,
        ]);

        \Auth::login($user);

        $user->sendMobileVerificationNotification();

        return $user;
    }
}
