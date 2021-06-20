<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
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
        $this->call(BranchSeeder::class);
        $this->call(ShipTypeSeeder::class);
        $this->call(ShipClassSeeder::class);
        $this->call(ChapterTypeSeeder::class);
        $this->call(ChapterSeeder::class);
        $this->call(UserSeeder::class);
    }
}
