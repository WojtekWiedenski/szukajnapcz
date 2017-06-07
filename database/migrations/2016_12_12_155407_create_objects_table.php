<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('photo_id')->unsigned()->index();
            $table->string('type');
            $table->string('name');
            $table->text('description');
            $table->text('code');
            $table->string('url');
            $table->string('adress');
            $table->string('lat');
            $table->string('lng');
            $table->string('clat0');
            $table->string('clng0');
            $table->string('clat1');
            $table->string('clng1');
            $table->string('clat2');
            $table->string('clng2');
            $table->string('clat3');
            $table->string('clng3');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}
