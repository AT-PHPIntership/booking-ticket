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
        $categories = App\Models\Category::all();
        $films = App\Models\Film::all();
        for ($i = 0; $i < 10; $i++) { 
            DB::table('category_film')->insert([
                'category_id' => $categories->random()->id,
                'film_id' => $films->random()->id
            ]);
        }
    }
}
