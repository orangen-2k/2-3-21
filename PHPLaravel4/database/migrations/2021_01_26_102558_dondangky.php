<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dondangky extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dondangky', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hodem');
            $table->string('ten');
            $table->string('gioitinh');
            $table->string('ngaysinh');
            $table->string('diachi');
            $table->string('thanhpho');
            $table->string('gioithieu');
            $table->string('anh');
            $table->string('sodienthoai');
            $table->string('email');
            $table->integer('trangthai');
            $table->integer('iduser');
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
        Schema::dropIfExists('dondangky');
    }
}
