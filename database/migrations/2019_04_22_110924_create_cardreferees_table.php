<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardRefereesTable extends Migration
{
    public function up()
    {
        // 卡片推荐人
        Schema::create('card_referees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable()->comment('标题');
            $table->string('describe')->nullable()->comment('描述');
            $table->string('category_title')->nullable()->comment('分类标题');
            $table->string('icon')->nullable()->comment('图标');
            $table->string('url')->nullable()->comment('链接地址');
            $table->integer('user_id')->index()->nullable()->comment('推荐人id');
            $table->string('nickname')->nullable()->comment('推荐人昵称');
            $table->string('homepage')->nullable()->comment('个人首页');
            $table->string('contact')->nullable()->comment('推荐人的联系方式');
            $table->string('label')->nullable()->comment('推荐添加的标签');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('card_referees');
    }
}
