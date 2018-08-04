<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Seat::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
