<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id')->comment('id');
            $table->string('brand_name')->comment('品牌名称');
            $table->unsignedInteger('brand_pid')->comment('pid');
            $table->string('brand_path')->comment('path');
            $table->string('brand_logo')->comment('logo');
            $table->timestamps();
            $table->comment = '品牌表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
