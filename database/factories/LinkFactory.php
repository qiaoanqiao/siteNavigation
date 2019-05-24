<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Link::class, function (Faker $faker) {
    $date_time = $faker->date.' '.$faker->time;
    return [
        'title' => $faker->name,
        'url' => '#',
        'order' => random_int(0, 100),
        'icon' => '',
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
