<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvds', function (Blueprint $table) {
            $table->bigIncrements('id_dvd');
            $table->unsignedBigInteger('produtoras_id');
            $table->foreign('produtoras_id')->references('id_produtora')->on('produtoras')->onDelete('cascade');
            $table->integer('ano');
            $table->string('titulo', 150);
            $table->longText('sinopse');
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
        Schema::dropIfExists('dvds');
    }
}
