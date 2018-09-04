<?php

namespace Tests\Browser\Admin\Category;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Category\UpdateCategoryPage;
use App\Models\Category;

class UpdateCategoryTest extends DuskTestCase
{
    use DatabaseMigrations;
    private const CREATED_LIST_CATEGORY = 15;

    public function setUp()
    {
        parent::setUp();
        factory(Category::class, self::CREATED_LIST_CATEGORY)->create();
    }

    /**
     * A Dusk test example it can update category
     *
     * @return void
     */
    public function test_it_can_update_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->admin)
                    ->visit(new UpdateCategoryPage(Category::find(1)))
                    ->type('name', 'Phim Kinh Dị')
                    ->press('Edit')
                    ->assertPathIs('/admin/categories')
                    ->assertSee(trans('category.admin.message.edit'));
            $this->assertDatabaseHas('categories', ['name' => 'Phim Kinh Dị']);        
        });
    }

    /**
     * List test case for invalid input of update category
     * 
     * @return array
     */
    public function list_test_case_validate_input_update_category()
    {
        return [
            ['name', '', 'Please enter name.'],
            ['name', 'Phim hành động', 'Category name exits please enter another name.'],
        ];
    }

    /**
     * Test validate input for updating category
     *
     * @param string $name
     * @param string $content
     * @param string $message
     *
     * @dataProvider list_test_case_validate_input_update_category
     * 
     * @return array
     */
    public function test_it_can_not_update_category($name, $content, $message)
    {
        Category::find(2)->update(['name' => 'Phim hành động']);
        $this->browse(function (Browser $browser) use ($name, $content, $message) {
            $browser->loginAs($this->admin)
                    ->visit(new UpdateCategoryPage(Category::find(1)))
                    ->type($name, $content)
                    ->press('Edit')
                    ->assertPathIs('/admin/categories/1/edit')
                    ->assertSee($message);
        });
    }
}
