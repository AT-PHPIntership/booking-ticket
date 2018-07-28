<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Seat::class, function (Faker $faker) {
    $rowSeat= array('A', 'B', 'C', 'D', 'E', 'F', 'H', 'I');
    $seats=array();
    for ($i = 0; $i < count($rowSeat); $i++) {
        for ($j = 1; $j <= 10; $j++) {
            array_push($seats, $rowSeat[$i].$j);
        }
    }
    $seat = $seats[array_rand($seats)];
    return [
        'room_id' => App\Models\Room::all()->random()->id,
        'name' => $seat
    ];
});
