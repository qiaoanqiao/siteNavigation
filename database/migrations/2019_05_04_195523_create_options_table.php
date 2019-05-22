<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOptionsTable extends Migration 
{
	public function up()
	{
	    //配置表
		Schema::create('options', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('配置:键');
            $table->string('value')->default('')->comment('配置:值');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('options');
	}
}
