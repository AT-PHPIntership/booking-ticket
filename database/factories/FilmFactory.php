<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Film::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'actor' => $faker->name,
        'producer' => $faker->name,
        'director' => $faker->name,
        'duration' => $faker->numberBetween($min = 90, $max = 180),
        'describe' => $faker->text($maxNbChars = 200),
        'country' => $faker->country,
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'end_date' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
