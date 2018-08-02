<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Rating::class, function (Faker $faker) {
    return [
        'user_id' => App\Models\User::all()->random()->id,
        'film_id' => App\Models\Film::all()->random()->id,
        'rate' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
