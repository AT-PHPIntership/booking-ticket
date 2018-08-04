<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) { 
            DB::table('comments')->insert([
                'user_id' => App\Models\User::all()->random()->id,
                'film_id' => App\Models\Film::all()->random()->id,
                'content' => $faker->text($maxNbChars = 200)
            ]);
        }
    }
}
