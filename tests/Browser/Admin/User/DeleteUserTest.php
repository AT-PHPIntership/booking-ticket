<?php

namespace Tests\Browser\Admin\User;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\User\ListUserPage;
use App\Models\User;

class DeleteUserTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        factory(User::class, 3)->create();
    }

    /**
     * A Dusk test case when admin delete use success.
     *
     * @return void
     */
    public function test_admin_delete_user_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new ListUserPage)
                    ->click('@deleteUser')
                    ->assertDialogOpened(trans('user.admin.message.del'))
                    ->acceptDialog()
                    ->assertSee(trans('user.admin.message.del_success'));
            $this->assertSoftDeleted('users', ['id' => 2]);
        });
    }

    /**
     * A dusk test case when admin delete user fail
     *
     * @return void
     */
    public function test_admin_delete_user_fail() 
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new ListUserPage)
                    ->click('@deleteUser')
                    ->assertDialogOpened(trans('user.admin.message.del'))
                    ->dismissDialog();
            $this->assertDatabaseHas('users', ['id' => 2, 'deleted_at' => null]);
        });
    }
}
