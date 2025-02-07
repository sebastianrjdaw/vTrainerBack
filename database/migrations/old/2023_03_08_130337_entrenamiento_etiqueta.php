<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EntrenamientoEtiqueta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrenamiento_etiqueta', function (Blueprint $table) {
            $table->bigInteger('entrenamiento_id')->unsigned();
            $table->bigInteger('etiqueta_id')->unsigned();
            $table->foreign('entrenamiento_id')->references('id')->on('entrenamientos');
            $table->foreign('etiqueta_id')->references('id')->on('etiquetas');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entrenamiento_etiqueta');
    }
}
