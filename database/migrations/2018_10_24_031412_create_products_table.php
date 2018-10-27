<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
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
            $table->string('img_title',255)->comment('图片标题');
            $table->string('titles',255)->comment('简略标题');
            $table->integer('number')->comment('产品编号');
            $table->string('place',255)->comment('产品产地');
            $table->string('material',255)->comment('材质');
            $table->string('brand',50)->comment('品牌');
            $table->double('height', 8, 2)->comment('产品重量');
            $table->double('zprice', 8, 2)->comment('展示价格');
            $table->double('sprice', 8, 2)->comment('市场价格');
            $table->string('keyword',255)->comment('关键词');
            $table->string('content',200)->comment('内容摘要');
            $table->string('file',200)->comment('图片上传');
            $table->longText('scontent',200)->comment('详细内容');
            $table->timestamps();
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
