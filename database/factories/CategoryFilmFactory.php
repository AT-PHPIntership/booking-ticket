<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CategoryFilm::class, function (Faker $faker) {
    return [
        'category_id' => App\Models\Category::all()->random()->id,
        'film_id' => App\Models\Film::all()->random()->id
    ];
});
