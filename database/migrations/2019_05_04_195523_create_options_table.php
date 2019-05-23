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
            $table->longText('value')->comment('配置:值');
            $table->string('type')->default('text')->comment('配置类型:后台输入框类型,为空则为组');
            $table->string('describe')->default('')->comment('描述');
            $table->integer('parent_id')->default(0)->comment('父级id');
            $table->integer('order')->default(0)->comment('父级id');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('options');
	}
}
