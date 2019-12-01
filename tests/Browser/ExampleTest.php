<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Log;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $app_url = env('APP_URL', 'http://127.0.0.1:8000/');
            Log::debug('Browser/ExampleTest testBasicExample $app_url:'.$app_url);
            
            $browser->visit($app_url)
                    ->assertSee('MEDUSA');
            
            $browser->visit($app_url . 'login')
                    ->assertSee('MEDUSA');
            
            $browser->visit($app_url . 'register')
                    ->assertSee('MEDUSA');
        });
    }
}
