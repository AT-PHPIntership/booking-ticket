<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Image::class, function (Faker $faker) {
    return [
        'path' => "images/upload/".$faker->numberBetween($min = 1, $max = 1000).".jpg",
    ];
});
