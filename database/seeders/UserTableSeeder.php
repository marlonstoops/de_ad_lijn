<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'email'    => 'marlon.stoops@hotmail.com',
            'name'     => 'marlon',
            'mobile'   => '+32485933063',
            'credit'   => 3,
            'password' => Hash::make('password'),
        ]);
    }
}
