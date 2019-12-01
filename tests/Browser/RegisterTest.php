<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Log;

class RegisterTest extends DuskTestCase
{
    /**
     * Check for the basic headings
     *
     * @return void
     */
    public function testRegisterHeadings()
    {
        $this->browse(function (Browser $browser) {
            $app_url = env('APP_URL', 'http://127.0.0.1:8000/');
            
            $browser->visit($app_url . 'register')
                    ->AssertSee('MEDUSA');
            
            $browser->AssertSee('Register');
            
            $browser->AssertSee('First Name');
            $browser->AssertSee('Middle Name');
            $browser->AssertSee('Last Name');
            $browser->AssertSee('Suffix');
            
            $browser->AssertSee('Address');
            $browser->AssertSee('Address Line 2');
            $browser->AssertSee('Country');
            $browser->AssertSee('State/Province');
            $browser->AssertSee('City');
            $browser->AssertSee('Postal Code');
            
            $browser->AssertSee('Telephone');
            $browser->AssertSee('Date of Birth');
            $browser->AssertSee('E-Mail Address');
            $browser->AssertSee('Password');
            $browser->AssertSee('Confirm Password');
            $browser->AssertSee('Register');
            
            $browser->AssertSee('Required');            
            
        });
    }
    
    /**
     * @return void
     */
    public function testRegisterFields()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/register')
            ->assertSee('MEDUSA');
            
            $browser->type('#first_name', 'Herman');
            $browser->type('#middle_name', 'E.');
            $browser->type('#last_name', 'Munster');
            $browser->select('suffix', 'None');
            
            $browser->type('#address_1', '1313 Mockingbird Lane');
            $browser->type('#address_2', 'Under the Stairs');

            $browser->type('#city', 'Mockingbird Heights');
            $browser->type('#postal_code', '94013');
            
            $browser->type('#telephone', '415-330-1313');
            $browser->type('#dob', 'October 31, 1947');
            $browser->type('#email', 'HermanMunster@AOL.com');
            
            $browser->type('#password', 'Lily13Eddie');
            
            $browser->click('input[id=country-selectized]');
            $browser->click('div[data-value="USA"]');
            
            $browser->type('#password-confirm', 'Lily13Eddie');
            
            $browser->click('#state_province-selectized'); 
            $browser->type('#state_province-selectized', 'California');
            
            $browser->press('Register');
            $browser->waitForReload();
            $browser->waitForText('Verify Your Email Address', 5);        
        });
    }
    
    public function elements()
    {
        return [
            '@country' => 'input[id=country-selectized]',
            '@state' => 'input[id=state_province-selectized]',
        ];
    }
            
}
