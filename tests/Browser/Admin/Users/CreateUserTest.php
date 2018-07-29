<?php

namespace Tests\Browser\Admin\Users;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateUserTest extends DuskTestCase
{
    /**
     * Test url for create user.
     *
     * @return void
     */
    public function testURLForCreateUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/dashboard')
                ->clickLink('Users')
                ->assertSee('Add User')
                ->clickLink('Add User')
                ->assertPathIs('/admin/users/create')
                ->assertSee('Add User');
        });
    }

    /**
     * List case to test form create user in admin page
     *
     * @return void
     */
    public function caseTestInput()
    {
        return [
            ['full_name', '', 'Please enter full name.'],
            ['email', '', 'Please enter email.'],
            ['password', '', 'Please enter password.'],
            ['email', 'abc@a', 'The email must be a valid email address.'],
            ['password', 'a', 'The password must be at least 8 characters.']
        ];
    }

    /**
     * Undocumented function
     *
     * @param string $field field of content
     * @param string $content content to test
     * @param string $message message show
     * 
     * @dataProvider caseTestInput
     * 
     * @return void
     */
    public function testInputData($field, $content, $message)
    {
        $this->browse(function (Browser $browser) use ($field, $content, $message){
            $browser->visit('/admin/users/create')
                    ->type($field, $content)
                    ->press('Submit')
                    ->assertSee($message);
        });
    }
    
    /**
     * Test data when success add user to database
     *
     * @return void
     */
    public function testSuccessCreateUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/users/create')
                    ->type('full_name', 'Nguyen Huu Khanh')
                    ->type('email', 'butchicun1236@gmail.com')
                    ->type('password', 'passwordIsSecret')
                    ->type('phone', '01695114846')
                    ->type('address', 'Da Nang')
                    ->press('Submit');
                $this->assertDatabaseHas('users',[
                    'full_name' => 'Nguyen Huu Khanh',
                    'email' => 'butchicun1236@gmail.com',
                    'password' => bcrypt('passwordIsSecret'),
                    'phone' => '01695114846',
                    'address' => 'Da Nang'
                ]);
        });
    }

    /**
     * Test if has email in database before
     *
     * @return void
     */
    public function testUniqueEmailInDatabase()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/users/create')
                    ->type('full_name', 'Nguyen Huu Khanh')
                    ->type('email', 'butchicun1236@gmail.com')
                    ->type('password', 'passwordIsSecret')
                    ->type('phone', '01695114846')
                    ->type('address', 'Da Nang')
                    ->press('Submit')
                    ->assertSee('This email linked to another account.');
        });
    }
}
