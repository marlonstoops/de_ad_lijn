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
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email,NULL,NULL,deleted_at,NULL'],
            'mobile'   => ['required', 'string', new Mobile, 'unique:users,mobile,NULL,NULL,deleted_at,NULL', 'exists:ad_lijnen'],
            'password' => $this->passwordRules(),
        ], [
            'mobile.exists' => 'You should get a call first before you are able to register.',
        ])->validate();

        $data = [
            'name'     => $input['name'],
            'email'    => $input['email'],
            'mobile'   => $input['mobile'],
            'password' => Hash::make($input['password']),
        ];

        $user = User::withTrashed()->where('mobile', $input['mobile'])->first();

        if ($user) {
            $user->restore();
            $user->update($data);
            $user->save();
        } else {
            $data['credit'] = 5;
            $user           = User::create($data);
        }

        \Auth::login($user);

        $user->sendMobileVerificationNotification();

        return $user;
    }
}
