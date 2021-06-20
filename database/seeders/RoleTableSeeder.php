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
        $createUsers = Permission::where('slug', 'create-users')->first()->id;
        $deleteUsers = Permission::where('slug', 'delete-users')->first()->id;
        $editUsers = Permission::where('slug', 'update-users')->first()->id;
        $viewUsers = Permission::where('slug', 'view-users')->first()->id;

        $createBranches = Permission::where('slug', 'create-branches')->first()->id;
        $deleteBranches = Permission::where('slug', 'delete-branches')->first()->id;
        $editBranches = Permission::where('slug', 'update-branches')->first()->id;
        $viewBranches = Permission::where('slug', 'view-branches')->first()->id;

        $createShipTypes = Permission::where('slug', 'create-shiptypes')->first()->id;
        $deleteShipTypes = Permission::where('slug', 'delete-shiptypes')->first()->id;
        $editShipTypes = Permission::where('slug', 'update-shiptypes')->first()->id;
        $viewShipTypes = Permission::where('slug', 'view-shiptypes')->first()->id;

        $createShipClasses = Permission::where('slug', 'create-shipclasses')->first()->id;
        $deleteShipClasses = Permission::where('slug', 'delete-shipclasses')->first()->id;
        $editShipClasses = Permission::where('slug', 'update-shipclasses')->first()->id;
        $viewShipClasses = Permission::where('slug', 'view-shipclasses')->first()->id;

        $createChapters = Permission::where('slug', 'create-chapters')->first()->id;
        $deleteChapters = Permission::where('slug', 'delete-chapters')->first()->id;
        $editChapters = Permission::where('slug', 'update-chapters')->first()->id;
        $viewChapters = Permission::where('slug', 'view-chapters')->first()->id;
        $viewChapterMembers = Permission::where('slug', 'view-chapter-members')->first()->id;

        $createChapterTypes = Permission::where('slug', 'create-chaptertypes')->first()->id;
        $deleteChapterTypes = Permission::where('slug', 'delete-chaptertypes')->first()->id;
        $editChapterTypes = Permission::where('slug', 'update-chaptertypes')->first()->id;
        $viewChapterTypes = Permission::where('slug', 'view-chaptertypes')->first()->id;

        $admin = new Role();
        $admin->slug = 'admin';
        $admin->name = 'Admin';
        $admin->save();
        $admin->permissions()->attach([
            $createUsers,
            $deleteUsers,
            $editUsers,
            $viewUsers,
            $createBranches,
            $deleteBranches,
            $editBranches,
            $viewBranches,
            $createShipTypes,
            $deleteShipTypes,
            $editShipTypes,
            $viewShipTypes,
            $createShipClasses,
            $deleteShipClasses,
            $editShipClasses,
            $viewShipClasses,
            $createChapters,
            $deleteChapters,
            $editChapters,
            $viewChapters,
            $viewChapterMembers,
            $createChapterTypes,
            $deleteChapterTypes,
            $editChapterTypes,
            $viewChapterTypes,
        ]);

        $member = new Role();
        $member->slug = 'member';
        $member->name = 'Member';
        $member->save();

        $member->permissions()->attach([
            $viewBranches,
            $viewShipTypes,
            $viewShipClasses,
            $viewChapters,
            $viewChapterMembers,
            $viewChapterTypes,
        ]);
    }
}
