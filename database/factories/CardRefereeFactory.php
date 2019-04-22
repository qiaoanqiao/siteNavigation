<?php

use Faker\Generator as Faker;

$factory->define(App\Models\CardReferee::class, function (Faker $faker) {
    $date_time = $faker->date.' '.$faker->time;
//    $table->increments('id');
//    $table->string('title')->nullable();
//    $table->string('describe')->nullable();
//    $table->string('category_title')->nullable();
//    $table->string('icon')->nullable();
//    $table->string('url')->nullable();
//    $table->integer('user_id')->index()->nullable();
//    $table->string('nickname')->nullable();
//    $table->string('homepage')->nullable();
//    $table->string('contact')->nullable();
//    $table->string('label')->nullable();
//    $table->softDeletes();
//    $table->timestamps();
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
