<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaEntrenamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_entrenamientos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('entrenamiento_id')->unsigned();
            $table->bigInteger('dia_semana_id')->unsigned();
            $table->foreign('entrenamiento_id')->references('id')->on('entrenamientos');
            $table->foreign('dia_semana_id')->references('id')->on('dia_semanas');
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
        Schema::dropIfExists('dia_entrenamientos');
    }
}
