<?php

use Faker\Generator as Faker;

$factory->define(App\Models\BookingDetail::class, function (Faker $faker) {
    return [
        'booking_id' => App\Models\Booking::all()->random()->id,
        'ticket_id' => App\Models\Ticket::all()->random()->id,
        'seat_id' => App\Models\Seat::all()->random()->id,
    ];
});
