<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
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
            DB::table('ratings')->insert([
                'user_id' => App\Models\User::all()->random()->id,
                'film_id' => App\Models\Film::all()->random()->id,
                'rate' => $faker->numberBetween($min = 1, $max = 5),
            ]);
        }
    }
}
