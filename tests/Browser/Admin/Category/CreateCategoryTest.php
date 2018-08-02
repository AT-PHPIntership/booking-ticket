<?php

namespace Tests\Browser\Admin\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Category\CreateCategoryPage;
use App\Models\Category;

class CreateCategoryTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * A Dusk test it can add new category
     *
     * @return void
     */
    public function test_it_can_add_new_caterory()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new CreateCategoryPage)
                    ->type('name', 'Phim Hành Động')
                    ->press('Submit')
                    ->assertPathIs('/admin/categories');
            $this->assertDatabaseHas('categories', ['name' => 'Phim Hành Động']);
        });
    }

    /**
     * A Dusk test it can add fail category
     *
     * @return void
     */
    public function test_it_can_add_new_caterory_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new CreateCategoryPage)
                    ->type('name', '')
                    ->press('Submit')
                    ->assertPathIs('/admin/categories/create')
                    ->assertSee(trans('category.admin.add.message.msg_require_name'));
        });
    }
}
