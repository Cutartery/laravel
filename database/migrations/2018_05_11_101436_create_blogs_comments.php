<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('content')->comment('内容');
            $table->timestamps();
            $table->unsignedInteger('user_id')->comment('用户ID');
            $table->unsignedInteger('blog_id')->comment('日志ID')->index();
            $table->unsignedInteger('zhan')->comment('点赞人数');
            $table->engine="innoDB";
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs_comments');
    }
}
