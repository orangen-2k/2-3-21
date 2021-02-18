<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phoneNumber')->nullable();
            $table->string('birthYear')->nullable();
            $table->string('province')->nullable();
            $table->string('summary')->nullable();
            $table->string('streetInformation')->nullable();
            $table->integer('active')->nullable();
            $table->integer('level');
            $table->integer('comment_id')->nullable();
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
        Schema::dropIfExists('users');
    }
}
