<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viewUsers = new Permission();
        $viewUsers->slug = 'view-users';
        $viewUsers->name = 'View Users';
        $viewUsers->save();

        $editUsers = new Permission();
        $editUsers->slug = 'edit-users';
        $editUsers->name = 'Edit Users';
        $editUsers->save();

        $deleteUsers = new Permission();
        $deleteUsers->slug = 'delete-users';
        $deleteUsers->name = 'Delete Users';
        $deleteUsers->save();

        $createUsers = new Permission();
        $createUsers->slug = 'create-users';
        $createUsers->name = 'Create Users';
        $createUsers->save();

        $viewBranches = new Permission();
        $viewBranches->slug = 'view-branches';
        $viewBranches->name = 'View Branches';
        $viewBranches->save();

        $editBranches = new Permission();
        $editBranches->slug = 'edit-branches';
        $editBranches->name = 'Edit Branches';
        $editBranches->save();

        $deleteBranches = new Permission();
        $deleteBranches->slug = 'delete-branches';
        $deleteBranches->name = 'Delete Branches';
        $deleteBranches->save();

        $createBranches = new Permission();
        $createBranches->slug = 'create-branches';
        $createBranches->name = 'Create Branches';
        $createBranches->save();
    }
}
