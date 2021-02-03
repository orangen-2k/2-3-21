<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tableintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tieude');
            $table->string('tieudekhongdau');
            $table->string('tomtat');
            $table->string('noidung');
            $table->string('hinh');
            $table->integer('noibat');
            $table->integer('soluotxem');
            $table->integer('idloaitin');
            $table->integer('loaitin_id')->unsigned();
            $table->foreign('loaitin_id')->references('id')->on('loaitin');
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
        Schema::dropIfExists('tintuc');
    }
}
