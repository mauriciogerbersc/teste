<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDvdsLegendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dvds_legendas', function (Blueprint $table) {
            $table->unsignedBigInteger('dvds_id');
            $table->foreign('dvds_id')->references('id_dvd')->on('dvds')->onDelete('cascade');
            $table->unsignedBigInteger('legendas_id');
            $table->foreign('legendas_id')->references('id_legenda')->on('legendas')->onDelete('cascade');
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
        Schema::dropIfExists('dvds_legendas');
    }
}
