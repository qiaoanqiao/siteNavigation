<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    $date_time = $faker->date.' '.$faker->time;
    return [
        'title' => $faker->title,
        'order' => random_int(0, 100),
        'icon' => '',
        'udid' => $faker->unique()->firstName,
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
