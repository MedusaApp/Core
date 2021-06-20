<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ShipTypeSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(ShipClassSeeder::class);
        $this->call(ChapterTypeSeeder::class);
    }
}
