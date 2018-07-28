<?php

use Illuminate\Database\Seeder;

class BookingDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\BookingDetail', 10)->create();
    }
}
