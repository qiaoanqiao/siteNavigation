<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration 
{
	public function up()
	{
	    //卡片
		Schema::create('cards', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index()->comment('卡片标题');
            $table->string('describe')->default('')->comment('描述');
            $table->string('url')->comment('网站地址');
            $table->string('icon')->default('')->comment('图标');
            $table->string('logo')->default('')->comment('网站logo');
            $table->integer('category_id')->unsigned()->index()->comment('分类id');
            $table->string('label')->nullable()->comment('标签');
            $table->boolean('like')->unsigned()->index()->comment('喜欢');
            $table->integer('order')->unsigned()->default(0)->comment('排序');
            $table->boolean('reco')->default(0)->unsigned()->comment('是否推荐');
            $table->softDeletes();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('cards');
	}
}
