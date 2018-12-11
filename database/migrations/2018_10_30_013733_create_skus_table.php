<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pro_id')->comment('商品id');
            $table->string('title')->comment('商品标题');
            $table->string('name')->comment('商品名称');
            $table->decimal('sku_price',12,2)->comment('sku价格');
            $table->unsignedInteger('sku_stock')->comment('sku库存');
            $table->comment='sku';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skus');
    }
}
