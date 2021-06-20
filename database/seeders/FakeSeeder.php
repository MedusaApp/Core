<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Seed the application's database with fake data.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
    }
}
