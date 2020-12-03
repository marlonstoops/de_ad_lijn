<?php

namespace App\Actions\Jetstream;

use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     */
    public function delete($user)
    {
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();

        $user->name                      = '';
        $user->email                     = '';
        $user->email_verified_at         = null;
        $user->mobile_verified_at        = null;
        $user->two_factor_secret         = null;
        $user->two_factor_recovery_codes = null;
        $user->current_team_id           = null;
        $user->profile_photo_path        = null;
        $user->password                  = encrypt('password');
        $user->save();

        $user->delete();
    }
}
