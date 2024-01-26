<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EntrenamientoSesion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrenamiento_sesion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entrenamiento_id');
            $table->unsignedBigInteger('sesion_id');
            $table->foreign('entrenamiento_id')->references('id')->on('entrenamientos')->onDelete('cascade');
            $table->foreign('sesion_id')->references('id')->on('sesions')->onDelete('cascade');
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
        Schema::dropIfExists('entrenamiento_sesions');
    }
}
