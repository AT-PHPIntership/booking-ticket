<?php

namespace Tests\Browser\Admin\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Category\ListCategoryPage;
use App\Models\Category;

class ListCategoryTest extends DuskTestCase
{
    use DatabaseMigrations;
    private const CREATED_CATEGORY = 17;

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Test data empty.
     *
     * @return void
     */
    public function testDataEmpty()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new ListCategoryPage)
                    ->assertSee(__('category.admin.list.title'));
            $elements = $browser->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 0);
        });
    }

    /**
     * A Dusk test it can show all category
     *
     * @return void
     */
    public function test_it_can_show_all_category_paginate()
    {
        $this->browse(function (Browser $browser) {
            factory(Category::class, self::CREATED_CATEGORY)->create();
            $browser->loginAs($this->admin);
            $elements = $browser->visit(new ListCategoryPage)
                                ->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == config('define.category.limit_rows'));
            $elements = $browser->visit('/admin/categories?page=4')
                ->elements('.table-responsive table tbody tr');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 2);
        });
    }
}
