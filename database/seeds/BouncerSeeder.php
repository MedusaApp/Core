<?php

use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define Admin role
        Bouncer::allow('admin')->everything();

        // Define Member role
        Bouncer::allow('member')->to('edit-self');
        Bouncer::allow('member')->to('change-pwd');
    }
}
