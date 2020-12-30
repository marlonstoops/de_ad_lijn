<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        if (! Role::where('name', 'admin')->first()) {
            Role::create(['name' => 'admin']);
        }

        $user = User::where('email', 'marlon.stoops@hotmail.com')->first();

        if ($user) {
            $user->assignRole('admin');
        }
    }
}
