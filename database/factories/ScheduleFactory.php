<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Schedule::class, function (Faker $faker) {
    return [
        'start_time' => date($format = 'Y-m-d H:i:s', $max = 'now'),
        'end_time' => date($format = 'Y-m-d H:i:s', $max = 'now')
    ];
});
