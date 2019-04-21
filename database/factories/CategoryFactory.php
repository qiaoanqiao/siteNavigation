<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    $date_time = $faker->date.' '.$faker->time;
//    table->increments('id');
//            $table->string('title')->comment('栏目标题');
//            $table->integer('parent_id')->unsigned()->index()->comment('上级栏目');
//            $table->integer('order')->unsigned()->index()->comment('排序');
//            $table->string('icon')->default('')->comment('栏目图标');
//            $table->softDeletes();
//            $table->timestamps();
    return [
        'title' => $faker->title,
//        'parent_id' => random,
        'order' => random_int(0, 100),
        'icon' => '',
        'created_at' => $date_time,
        'updated_at' => $date_time,
    ];
});
