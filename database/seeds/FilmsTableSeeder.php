<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Film::class, 10)->create()->each(function ($item) {
            $item->images()->saveMany(factory(App\Models\Image::class, 2)->make());
        });
    }
}
