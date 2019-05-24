<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CardReferee::class, function (Faker $faker) {
    $date_time = $faker->date.' '.$faker->time;
    return [
        'title' => $faker->title,
        'describe' => $faker->title,
        'category_title' => $faker->title,
        'icon' => '#',
        'url' => '#',
        'user_id' => 1,
        'nickname' => $faker->title,
        'homepage' => $faker->url,
        'contact' => $faker->phoneNumber,
        'label' => $faker->title,
        'created_at' => $date_time,
        'updated_at' => $date_time,

    ];
});
