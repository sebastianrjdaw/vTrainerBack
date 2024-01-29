<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_estadisticas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('jornada_id')->unsigned();
            $table->unsignedBigInteger('equipo_id');
            $table->float('ataque');
            $table->float('defensa');
            $table->float('recepcion');
            $table->float('bloqueo');
            $table->float('colocacion');
            $table->float('saque');
            $table->foreign('jornada_id')->references('id')->on('jornadas')->onDelete('cascade');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_estadisticas');
    }
}
