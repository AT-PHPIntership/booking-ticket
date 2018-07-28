<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Image::class, function (Faker $faker) {
    $path = "public/images/";
    return [
        'film_id' => App\Models\Film::all()->random()->id,
        'path' => $path.$faker->numberBetween($min = 1, $max = 1000).".jpg",
    ];
});
