<?php

namespace Tests\Browser\Pages\Admin\User;

use Laravel\Dusk\Browser;
use App\Models\User;
use Laravel\Dusk\Page;

class UpdateUserPage extends Page
{
    protected $user;
    public $successPath = '/admin/users';

    /**
     * Contructor
     *
     * @param User $user user
     * 
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users/' . $this->user->id . '/edit';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                ->assertSee(trans('user.admin.edit.title'))
                ->assertSee(trans('user.admin.add.name'))
                ->assertSee(trans('user.admin.add.email'))
                ->assertSee(trans('user.admin.add.password'))
                ->assertSee(trans('user.admin.add.phone'))
                ->assertSee(trans('user.admin.add.address'))
                ->assertSee(trans('user.admin.add.submit'));
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
