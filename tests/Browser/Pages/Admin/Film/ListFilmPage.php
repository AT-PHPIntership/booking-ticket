<?php

namespace Tests\Browser\Pages\Admin\Film;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class ListFilmPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/films';
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
                ->assertTitleContains(trans('film.admin.list.title'))
                ->assertSee(trans('film.admin.list.title'))
                ->assertSee(trans('film.admin.table.id'))
                ->assertSee(trans('film.admin.table.name'))
                ->assertSee(trans('film.admin.table.actor'))
                ->assertSee(trans('film.admin.table.duration'))
                ->assertSee(trans('film.admin.table.image'))
                ->assertSee(trans('film.admin.table.country'))
                ->assertSee(trans('film.admin.table.delete'))
                ->assertSee(trans('film.admin.table.edit'));
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
            '@form' => '.table-responsive table tbody tr'
        ];
    }
}
