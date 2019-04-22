<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration 
{
	public function up()
	{
	    //友情链接
		Schema::create('links', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->string('url')->default('')->comment('链接地址');
            $table->integer('order')->unsigned()->comment('排序');
            $table->string('icon')->default('')->comment('图标');
            $table->softDeletes();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('links');
	}
}
