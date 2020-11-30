<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
              'email' => 'marlon.stoops@hotmail.com',
              'name' => 'marlon',
              'password' => Hash::make('password'),
         ]);
    }
}
