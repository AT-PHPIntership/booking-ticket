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
        for ($i = 0; $i < 10; $i++) { 
            DB::table('category_film')->insert([
                'category_id' => App\Models\Category::all()->random()->id,
                'film_id' => App\Models\Film::all()->random()->id
            ]);
        }
    }
}
