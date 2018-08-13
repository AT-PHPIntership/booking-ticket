<?php

namespace Tests\Browser\Pages\Admin\User;

use Laravel\Dusk\Browser;

class DeleteUserPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/users';
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
                ->click('@deleteUser')
                ->assertDialogOpened(trans('user.admin.message.del'))
                ->acceptDialog()
                ->assertSee(trans('user.admin.message.del_success'));
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@deleteUser' => 'tbody > tr:nth-child(2) > td:nth-child(9) > form > button'
        ];
    }
}
