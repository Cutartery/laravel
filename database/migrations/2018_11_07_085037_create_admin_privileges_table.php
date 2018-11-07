<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_privileges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pri_name')->comment('权限名称');
            $table->string('url_path')->comment('对应的URL地址，多个地址用,隔开');
            $table->unsignedInteger('parent_id')->default(0)->comment('上级权限的ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_privileges');
    }
}
