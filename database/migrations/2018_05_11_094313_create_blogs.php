<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->longText('content')->comment('内容');
            $table->timestamps();
            $table->unsignedBigInteger('display')->default('0')->comment('浏览量');
            $table->enum('accessable',['public','protected','private'])->default('public')->comment('访问权限');
            $table->unsignedInteger('user_id')->comment('用户ID')->index();
            $table->unsignedInteger('zhan')->default('0')->comment('点赞人数');
            $table->engine='innoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
