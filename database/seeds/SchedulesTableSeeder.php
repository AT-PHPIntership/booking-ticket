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
        $films = App\Models\Film::all();
        $rooms = App\Models\Room::all();
        factory(App\Models\Schedule::class, 10)->create([
            'film_id' => $films->random()->id,
            'room_id' => $rooms->random()->id,
        ]);
    }
}
