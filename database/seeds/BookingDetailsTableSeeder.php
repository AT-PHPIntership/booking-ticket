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
        for ($i = 0; $i < 10; $i++) { 
            DB::table('booking_details')->insert([
                'booking_id' => App\Models\Booking::all()->random()->id,
                'ticket_id' => App\Models\Ticket::all()->random()->id,
                'seat_id' => App\Models\Seat::all()->random()->id,
            ]);
        }
    }
}
