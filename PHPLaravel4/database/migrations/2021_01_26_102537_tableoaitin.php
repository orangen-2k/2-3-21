<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tableoaitin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaitin',function (Blueprint $table){
            $table->increments('id');
            $table->integer('idtheloai');
            $table->string('ten');
            $table->string('tenkhongdau');
            $table->integer('id_theloai')->unsigned();
            $table->foreign('id_theloai')->references('id')->on('theloai');
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
        Schema::dropIfExists('loaitin');
    }
}

