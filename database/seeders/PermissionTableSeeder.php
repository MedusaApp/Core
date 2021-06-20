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

        $updateUsers = new Permission();
        $updateUsers->slug = 'update-users';
        $updateUsers->name = 'Update Users';
        $updateUsers->save();

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

        $updateBranches = new Permission();
        $updateBranches->slug = 'update-branches';
        $updateBranches->name = 'Update Branches';
        $updateBranches->save();

        $deleteBranches = new Permission();
        $deleteBranches->slug = 'delete-branches';
        $deleteBranches->name = 'Delete Branches';
        $deleteBranches->save();

        $createBranches = new Permission();
        $createBranches->slug = 'create-branches';
        $createBranches->name = 'Create Branches';
        $createBranches->save();

        $viewShipTypes = new Permission();
        $viewShipTypes->slug = 'view-shiptypes';
        $viewShipTypes->name = 'View Ship Types';
        $viewShipTypes->save();

        $updateShipTypes = new Permission();
        $updateShipTypes->slug = 'update-shiptypes';
        $updateShipTypes->name = 'Update Ship Types';
        $updateShipTypes->save();

        $deleteShipTypes = new Permission();
        $deleteShipTypes->slug = 'delete-shiptypes';
        $deleteShipTypes->name = 'Delete Ship Types';
        $deleteShipTypes->save();

        $createShipTypes = new Permission();
        $createShipTypes->slug = 'create-shiptypes';
        $createShipTypes->name = 'Create Ship Types';
        $createShipTypes->save();

        $viewShipClasses = new Permission();
        $viewShipClasses->slug = 'view-shipclasses';
        $viewShipClasses->name = 'View Ship Classes';
        $viewShipClasses->save();

        $updateShipClasses = new Permission();
        $updateShipClasses->slug = 'update-shipclasses';
        $updateShipClasses->name = 'Update Ship Classes';
        $updateShipClasses->save();

        $deleteShipClasses = new Permission();
        $deleteShipClasses->slug = 'delete-shipclasses';
        $deleteShipClasses->name = 'Delete Ship Classes';
        $deleteShipClasses->save();

        $createShipClasses = new Permission();
        $createShipClasses->slug = 'create-shipclasses';
        $createShipClasses->name = 'Create Ship Classes';
        $createShipClasses->save();

        $viewChapterTypes = new Permission();
        $viewChapterTypes->slug = 'view-chaptertypes';
        $viewChapterTypes->name = 'View Chapter Types';
        $viewChapterTypes->save();

        $updateChapterTypes = new Permission();
        $updateChapterTypes->slug = 'update-chaptertypes';
        $updateChapterTypes->name = 'Update Chapter Types';
        $updateChapterTypes->save();

        $deleteChapterTypes = new Permission();
        $deleteChapterTypes->slug = 'delete-chaptertypes';
        $deleteChapterTypes->name = 'Delete Chapter Types';
        $deleteChapterTypes->save();

        $createChapterTypes = new Permission();
        $createChapterTypes->slug = 'create-chaptertypes';
        $createChapterTypes->name = 'Create Chapter Types';
        $createChapterTypes->save();

        $viewChapters = new Permission();
        $viewChapters->slug = 'view-chapters';
        $viewChapters->name = 'View Chapters';
        $viewChapters->save();

        $viewChapterMembers = new Permission();
        $viewChapterMembers->slug = 'view-chapter-members';
        $viewChapterMembers->name = 'View Chapter Members';
        $viewChapterMembers->save();

        $updateChapters = new Permission();
        $updateChapters->slug = 'update-chapters';
        $updateChapters->name = 'Update Chapters';
        $updateChapters->save();

        $deleteChapters = new Permission();
        $deleteChapters->slug = 'delete-chapters';
        $deleteChapters->name = 'Delete Chapters';
        $deleteChapters->save();

        $createChapters = new Permission();
        $createChapters->slug = 'create-chapters';
        $createChapters->name = 'Create Chapters';
        $createChapters->save();
    }
}
