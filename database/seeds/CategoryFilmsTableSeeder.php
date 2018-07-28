<?php

use Illuminate\Database\Seeder;

class CategoryFilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\CategoryFilm', 10)->create();
    }
}
