<?php

namespace Tests\Browser\Admin\User;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\User\ListUserPage;
use App\Models\User;

class ListUserTest extends DuskTestCase
{
    use DatabaseMigrations;

    private const CREATED_USER = 23;

    /**
     * Override function setup
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(User::class, self::CREATED_USER)->create();
    }

    /**
     * A Dusk test show user in first and last page.
     *
     * @return void
     */
    public function test_list_user_show_in_first_and_last_page()
    {
        $numOfPage = ceil(self::CREATED_USER / config('define.user.limit_rows'));
        $lastPage = self::CREATED_USER % config('define.user.limit_rows');
        
        $this->browse(function (Browser $browser) use ($numOfPage, $lastPage) {
            $browser->loginAs($this->admin)
                    ->visit(new ListUserPage);
                $userPageOne = $browser->elements('table.table tbody tr');
                $this->assertEquals(count($userPageOne), config('define.user.limit_rows'));

                $browser->visit('/admin/users?page=' . $numOfPage)
                        ->assertSee(trans('user.admin.list.title'));
                        
                $userLastPage = $browser->elements('table.table tbody tr');
                $this->assertEquals(count($userLastPage), ($lastPage + 1));
        });
    }
}
