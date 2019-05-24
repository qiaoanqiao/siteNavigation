<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Card::class, function (Faker $faker) {
    $date_time = $faker->date.' '.$faker->time;
    return [
        'title' => $faker->title,
        'describe' => $faker->title,
        'url' => '#',
        'logo' => '',
        'label' => "['" . $faker->title . "','".$faker->title."']",
        'like' => random_int(0, 100),
        'order' => random_int(0, 100),
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
