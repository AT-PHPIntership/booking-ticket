<?php

namespace Tests\Browser\Pages\Admin\User;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class CreateUserPage extends Page
{
    
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users/create';
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
                ->assertSee(trans('user.admin.add.title'))
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
            '@full_name' => 'full_name',
            '@email' => 'email',
            '@password' => 'password',
            '@phone' => 'phone',
            '@address' => 'address',
            '@submit' => 'Submit'
        ];
    }
}
