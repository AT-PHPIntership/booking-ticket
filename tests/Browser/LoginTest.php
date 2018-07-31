<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * Function setUp() for make user login
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Test Login as admin
     *
     * @return void
     */
    public function testFailLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->type('email', 'asanathan@gmail.err')
                    ->type('password', 'error')
                    ->press('Login')
                    ->assertSee('These credentials do not match our records.');
        });
    }

    /**
     * Test Login as admin
     *
     * @return void
     */
    public function testLoginAdminSuccess()
    {
        $this->browse(function ($browser) {
            $browser->visit('/admin/login')
                    ->type('email', $this->admin->email)
                    ->type('password', '12345')
                    ->press('Login');
            $browser->assertPathIs('/admin/dashboard');
        });
    }

    /**
    * A Dusk test for Logout Admin account.
    *
    * @return void
    */
   public function testLogoutAdmin()
   {
       $this->browse(function (Browser $browser) {
           $browser->loginAs($this->admin)
                   ->visit('/admin/dashboard')
                   ->click('#logout-button')
                   ->assertVisible('#link-click-me')
                   ->visit(
                       $browser->attribute('#link-click-me', 'href')
                   )
                   ->assertPathIs('/admin/login');
       });
   }
}
