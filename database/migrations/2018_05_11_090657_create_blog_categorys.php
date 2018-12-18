<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogCategorys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat_name',30)->comment('分类名称');
            $table->unsignedInteger('user_id')->comment('用户ID')->index();
            // $table->index('user_id');
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
        Schema::dropIfExists('blog_categorys');
    }
}
