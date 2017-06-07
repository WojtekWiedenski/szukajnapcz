<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('object_id')->unsigned()->nullable()->index();
            $table->integer('photo_id')->unsigned()->index();
            $table->string('name');
            $table->string('short_name');
            $table->char('level', 1);
            $table->string('type');
            $table->text('description');
            $table->integer('number')->unsigned;
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('object_id')->references('id')->on('objects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
