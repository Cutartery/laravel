<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table){
            $table->increments('id');
            $table->unsignedInteger('brand_id')->comment('品牌ID');
            $table->unsignedInteger('ify_id1')->comment('分类id1');
            $table->unsignedInteger('ify_id2')->comment('分类id2');
            $table->unsignedInteger('ify_id3')->comment('分类id3');
            $table->timestamps();
            $table->comment='商品品牌分类表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
