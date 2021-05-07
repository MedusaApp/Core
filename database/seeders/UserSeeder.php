<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->times(50)
            ->create();

        $adminRole = Role::where('slug', 'admin')->first();

        $adminUser = User::find(1);
        $adminUser->email = 'test@example.net';
        $adminUser->save();

        $adminUser->roles()->attach($adminRole);
    }
}
