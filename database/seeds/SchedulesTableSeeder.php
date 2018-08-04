<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $startTime = Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+1 days', $endDate = '+1 days')
                    ->getTimeStamp());
        $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $startTime)->addHours(2);
        for ($i = 0; $i < 10; $i++) { 
            DB::table('schedules')->insert([
                'film_id' => App\Models\Film::all()->random()->id,
                'room_id' => App\Models\Room::all()->random()->id,
                'start_time' => $startTime,
                'end_time' => $endTime
            ]);
        }
    }
}
