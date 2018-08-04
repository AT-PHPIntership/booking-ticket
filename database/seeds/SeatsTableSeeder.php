<?php

use Illuminate\Database\Seeder;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $character= array('A','B','C','D','E','F','H','I');
        $seats=array();
        for($k = 0; $k < count($character); $k++){
        	for($j = 1; $j <= 5; $j++){
        		array_push($seats, $character[$k].$j );
        	}
        }
        $rooms = App\Models\Room::all();
        for($j = 0; $j < count($rooms); $j++){
            for($h = 0; $h < count($seats); $h++){
                DB::table('seats')->insert([
                    'name'             => $seats[$h],
                    'status'           => $faker->numberBetween($min = 0, $max = 1),
                    'room_id'          => $rooms[$j]->id,
                ]);
            }
        }
    }
}
