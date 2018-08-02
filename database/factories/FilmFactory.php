<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Film::class, function (Faker $faker) {
    $duration = array(90, 120, 150, 180);
    $time = $duration[array_rand($duration)];
    return [
        'name' => $faker->name,
        'actor' => $faker->name,
        'producer' => $faker->name,
        'director' => $faker->name,
        'duration' => $time,
        'describe' => $faker->text($maxNbChars = 200),
        'country' => $faker->country,
    ];
});
