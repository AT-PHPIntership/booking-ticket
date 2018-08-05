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
    private $listTestPage;

    /**
     * Override function setup
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        factory(User::class, self::CREATED_USER)->create();
        $this->listTestPage = new ListUserPage;
    }

    /**
     * A Dusk test show user in first and last page.
     *
     * @return void
     */
    public function test_list_user_show_in_first_and_last_page()
    {
        $userPerPage = config('define.user.limit_rows');
        $numOfPage = ceil(self::CREATED_USER / $userPerPage);
        $lastPage = self::CREATED_USER % $userPerPage;

        $this->browse(function (Browser $browser) use ($userPerPage, $numOfPage, $lastPage) {
            $browser->loginAs($this->admin)
                ->visit($this->listTestPage);

            // Test user per page
            $userPageOne = $browser->elements('@elementGetUser');
            $this->assertEquals(count($userPageOne), $userPerPage);

            // Test user in last page
            $browser->visit($this->listTestPage->url() .'?page=' . $numOfPage)
                ->assertSee(trans('user.admin.list.title'));
            $userLastPage = $browser->elements('@elementGetUser');
            $this->assertEquals(count($userLastPage), ($lastPage + 1));
        });
    }
}
