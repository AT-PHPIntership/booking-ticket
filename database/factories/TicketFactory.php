<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Ticket::class, function (Faker $faker) {
    $typeTicket = array(array("Adult ticket", 60000), array("Childrent ticket", 45000)
                        ,array("Student ticket", 45000));
    $ticket = $typeTicket[array_rand($typeTicket)];
    return [
        'schedule_id' => App\Models\Schedule::all()->random()->id,
        'price' => $ticket[1],
        'type' => $ticket[0]
    ];
});
