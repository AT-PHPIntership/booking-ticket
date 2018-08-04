<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Rating::class, function (Faker $faker) {
    return [
        'rate' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
