<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tableommentdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('commentdetail', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('iduser');
//            $table->integer('idcomment');
//            $table->string('noidung');
//            $table->integer('comment_id')->unsigned();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
