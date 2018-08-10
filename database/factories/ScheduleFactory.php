<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Schedule::class, function (Faker $faker) {
    $startTime = Carbon::createFromTimestamp($faker->dateTimeBetween($startDate = '+1 days', $endDate = '+10 days')
                ->getTimeStamp());
    $endTime = Carbon::createFromFormat('Y-m-d H:i:s', $startTime)->addHours(2);
    return [
        'start_time' => $startTime,
        'end_time' => $endTime
    ];
});
