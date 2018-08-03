<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Film::class, function (Faker $faker) {
    $duration = array(90, 120, 150, 180);
    $time = $duration[array_rand($duration)];
    $actors = array('Brad Pitt', 'Angelina Jolie', 'Marion', 'Brie Larson',
     'Tom Hiddleston','Chris Pine', 'Tom Cruise', 'Brad fitt', 'Leonardo BeCaprio',
     'Taylor Swith', 'Leighton Meester', 'Emma Stone', 'Gaten Matarazzo', 'Nina Dobrev');
    $actors = $faker->randomElements($array = $actors, $count = 5);
    $actors = implode(',', $actors);
    return [
        'name' => $faker->name,
        'actor' => $actors,
        'producer' => $faker->name,
        'director' => $faker->name,
        'duration' => $time,
        'describe' => $faker->text($maxNbChars = 200),
        'country' => $faker->country,
    ];
});
