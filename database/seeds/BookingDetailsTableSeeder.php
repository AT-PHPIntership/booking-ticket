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
        $bookings = App\Models\Booking::all();
        $tickets = App\Models\Ticket::all();
        $seats = App\Models\Seat::where('status', 1)->get();
        for ($i = 0; $i < 10; $i++) { 
            DB::table('booking_details')->insert([
                'booking_id' => $bookings->random()->id,
                'ticket_id' => $tickets->random()->id,
                'seat_id' => $seats->random()->id,
            ]);
        }
    }
}
