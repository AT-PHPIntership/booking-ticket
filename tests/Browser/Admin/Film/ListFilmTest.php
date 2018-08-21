<?php

namespace Tests\Browser\Admin\Film;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\Admin\Film\ListFilmPage;
use App\Models\Film;
use App\Models\Image;
use App\Models\CategoryFilm;

class ListFilmTest extends DuskTestCase
{
    use DatabaseMigrations;
    private const CREATED_FILM = 17;
    private const CREATED_IMAGE = 2;

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
                    ->visit(new ListFilmPage)
                    ->assertSee(__('film.admin.list.title'));
            $elements = $browser->elements('@form');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 0);
        });
    }

    /**
     * A Dusk test it can show all film
     *
     * @return void
     */
    public function test_it_can_show_all_film_paginate()
    {
        $this->browse(function (Browser $browser) {
            factory(Film::class, self::CREATED_FILM)->create()->each(function ($item) {
                $item->images()->saveMany(factory(Image::class, self::CREATED_IMAGE)->make());
            });
            $browser->loginAs($this->admin);
            $elements = $browser->visit(new ListFilmPage)
                                ->elements('@form');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == config('define.category.limit_rows'));
            $elements = $browser->visit('/admin/films?page=4')
                ->elements('@form');
            $numRecord = count($elements);
            $this->assertTrue($numRecord == 2);
        });
    }
}
