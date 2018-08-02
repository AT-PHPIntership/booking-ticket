<?php

namespace Tests\Browser\Pages\Admin\Category;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Page;

class UpdateCategoryPage extends Page
{
    protected $category;
    public function __construct(\App\Models\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/admin/categories/'. $this->category->id . '/edit';
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
                ->assertTitleContains(trans('category.admin.edit.title'))
                ->assertSee(trans('category.admin.edit.title'))
                ->assertSee(trans('category.admin.table.name'));
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
