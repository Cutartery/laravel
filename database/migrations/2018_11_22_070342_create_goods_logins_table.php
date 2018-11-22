<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_logins', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name')->comment('用户名称');
            $table->string('pass')->comment('用户密码');
            $table->string('phone')->comment('用户手机号');
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
        Schema::dropIfExists('goods_logins');
    }
}
