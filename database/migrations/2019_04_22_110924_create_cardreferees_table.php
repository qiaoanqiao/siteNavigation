<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardRefereesTable extends Migration
{
    public function up()
    {
        Schema::create('card_referees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('describe')->nullable();
            $table->string('category_title')->nullable();
            $table->string('icon')->nullable();
            $table->string('url')->nullable();
            $table->integer('user_id')->index()->nullable();
            $table->string('nickname')->nullable();
            $table->string('homepage')->nullable();
            $table->string('contact')->nullable();
            $table->string('label')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('card_referees');
    }
}
