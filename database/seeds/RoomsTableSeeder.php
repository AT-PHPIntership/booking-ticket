<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = array('Room 01', 'Room 02', 'Room 03', 'Room 04'
                        , 'Room 05', 'Room 06', 'Room 07');
        for ($i = 0; $i < count($rooms); $i++) { 
            DB::table('rooms')->insert([
                'name' => $rooms[$i]
            ]);
        }
    }
}
