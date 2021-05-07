<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createUsers = Permission::where('slug', 'create-users')->first();
        $deleteUsers = Permission::where('slug', 'delete-users')->first();
        $editUsers = Permission::where('slug', 'edit-users')->first();
        $viewUsers = Permission::where('slug', 'view-users')->first();

        $createBranches = Permission::where('slug', 'create-branches')->first();
        $deleteBranches = Permission::where('slug', 'delete-branches')->first();
        $editBranches = Permission::where('slug', 'edit-branches')->first();
        $viewBranches = Permission::where('slug', 'view-branches')->first();

        $admin = new Role();
        $admin->slug = 'admin';
        $admin->name = 'Admin';
        $admin->save();
        $admin->permissions()->attach($createUsers);
        $admin->permissions()->attach($deleteUsers);
        $admin->permissions()->attach($editUsers);
        $admin->permissions()->attach($viewUsers);
        $admin->permissions()->attach($createBranches);
        $admin->permissions()->attach($deleteBranches);
        $admin->permissions()->attach($editBranches);
        $admin->permissions()->attach($viewBranches);

        $member = new Role();
        $member->slug = 'member';
        $member->name = 'Member';
        $member->save();

        $member->permissions()->attach($viewBranches);
    }
}
