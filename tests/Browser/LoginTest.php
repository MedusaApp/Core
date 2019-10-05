<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                    ->assertSee('MEDUSA');
            
            $browser->assertSee('This site uses cookies to personalize content, to provide social media features and to analyze traffic.');
            $browser->press('OK');
            $browser->assertDontSee('This site uses cookies to personalize content, to provide social media features and to analyze traffic.');
            
            $browser->assertSee('E-Mail Address');
            $browser->assertSee('Password');
            
            $browser->type('email', 'noOne@trmn.org');
            $browser->type('password', 'nonsense');
            $browser->press('Login');
            $browser->assertSee('These credentials do not match our records.');
            
        });
    }
}
