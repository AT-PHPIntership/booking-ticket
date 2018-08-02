<?php

namespace Tests\Browser\Pages\Admin\Category;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class ListCategoryPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/categories';
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
                ->assertTitleContains(trans('category.admin.list.title'))
                ->assertSee(trans('category.admin.list.title'))
                ->assertSee(trans('category.admin.table.id'))
                ->assertSee(trans('category.admin.table.name'))
                ->assertSee(trans('category.admin.table.created_at'))
                ->assertSee(trans('category.admin.table.updated_at'))
                ->assertSee(trans('category.admin.table.delete'))
                ->assertSee(trans('category.admin.table.edit'));
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
