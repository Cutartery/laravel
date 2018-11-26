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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name')->comment('商品名称');
            $table->unsignedInteger('brand_id')->comment('品牌ID');
            $table->unsignedInteger('ify_id1')->comment('分类id1');
            $table->unsignedInteger('ify_id2')->comment('分类id2');
            $table->unsignedInteger('ify_id3')->comment('分类id3');
            $table->string('pro_content',200)->comment('产品描述');
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
        Schema::dropIfExists('products');
    }
}
