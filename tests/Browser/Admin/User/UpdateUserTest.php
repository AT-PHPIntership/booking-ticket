<?php

namespace Tests\Browser\Admin\User;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\User\UpdateUserPage;
use App\Models\User;

class UpdateUserTest extends DuskTestCase
{
    private $updateUserPage;

    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        factory(User::class, 5)->create();
        $this->updateUserPage = new UpdateUserPage($this->admin);
    }

    /**
     * A Dusk test case when admin update user.
     *
     * @return void
     */
    public function test_admin_update_user_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                ->visit($this->updateUserPage)
                ->clear('email')
                ->clear('full_name')
                ->clear('phone')
                ->clear('address')
                ->type('email', 'emailedited@example.com')
                ->type('full_name', 'editedname')
                ->type('password', 'PasswordIsSecret')
                ->type('phone', '01695112225')
                ->type('address', 'Viet Nam')
                ->press('Submit')
                ->assertPathIs($this->updateUserPage->successPath);
            $this->assertDatabaseHas('users', [
                'id' => (string)$this->admin->id,
                'email' => 'emailedited@example.com'
            ]);
        });
    }

    public function test_admin_update_user_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                ->visit($this->updateUserPage)
                ->clear('email')
                ->clear('full_name')
                ->clear('phone')
                ->clear('address')
                ->press('Submit')
                ->assertPathIs($this->updateUserPage->url())
                ->assertSee(trans('user.admin.add.message.require_full_name'))
                ->assertSee(trans('user.admin.add.message.require_email'))
                ->assertSee(trans('user.admin.add.message.require_password'))
                ->assertSee(trans('user.admin.add.message.add_invalid_phone'))
                ->assertSee(trans('user.admin.add.message.require_address'));
            $this->assertDatabaseHas('users', [
                'id' => (string)$this->admin->id,
                'email' => 'taylor@laravel.com'
            ]);
        });
    }
}
