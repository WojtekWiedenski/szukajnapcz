<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paths', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('object_id')->unsigned()->nullable();
            $table->string('clat0');
            $table->string('clng0');
            $table->string('clat1');
            $table->string('clng1');
            $table->string('clat2');
            $table->string('clng2');
            $table->string('clat3');
            $table->string('clng3');
            $table->string('clat4');
            $table->string('clng4');
            $table->string('clat5');
            $table->string('clng5');
            $table->string('clat6');
            $table->string('clng6');
            $table->string('clat7');
            $table->string('clng7');
            $table->timestamps();

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
        Schema::dropIfExists('paths');
    }
}
