<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name')->comment('商品名称');
            $table->unsignedInteger('brand_id')->comment('品牌ID');
            $table->string('pro_content',200)->comment('产品描述');
            $table->unsignedInteger('pro_ify_one')->comment('分类一');
            $table->unsignedInteger('pro_ify_two')->comment('分类二');
            $table->unsignedInteger('pro_ify_three')->comment('分类三');
            $table->timestamps();
            $table->comment='产品基本信息表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
