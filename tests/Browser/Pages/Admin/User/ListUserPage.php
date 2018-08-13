<?php

namespace Tests\Browser\Pages\Admin\User;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class ListUserPage extends Page
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
            ->assertSee(trans('user.admin.list.title'))
            ->assertSee(trans('user.admin.table.id'))
            ->assertSee(trans('user.admin.table.name'))
            ->assertSee(trans('user.admin.table.email'))
            ->assertSee(trans('user.admin.table.phone'))
            ->assertSee(trans('user.admin.table.address'))
            ->assertSee(trans('user.admin.table.is_active'))
            ->assertSee(trans('user.admin.table.last_login'))
            ->assertSee(trans('user.admin.table.role'))
            ->assertSee(trans('user.admin.table.delete'))
            ->assertSee(trans('user.admin.table.edit'));
    }
  
    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@deleteUser' => 'tbody > tr:nth-child(2) > td:nth-child(9) > form > button',
            '@elementGetUser' => 'table.table tbody tr'
        ];
    }
}