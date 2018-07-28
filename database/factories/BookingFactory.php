<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Booking::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
    ];
});
