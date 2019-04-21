<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration 
{
	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('栏目标题');
            $table->integer('parent_id')->unsigned()->index()->comment('上级栏目');
            $table->integer('order')->unsigned()->index()->comment('排序');
            $table->string('icon')->default('')->comment('栏目图标');
            $table->softDeletes();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
