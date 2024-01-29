<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadorEstadisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugador_estadisticas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('jornada_id');
            $table->unsignedBigInteger('jugador_id');
            $table->float('ataque');
            $table->float('defensa');
            $table->float('recepcion');
            $table->float('bloqueo');
            $table->float('colocacion');
            $table->float('saque');
            $table->foreign('jornada_id')->references('id')->on('jornadas')->onDelete('cascade');
            $table->foreign('jugador_id')->references('id')->on('jugadors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugador_estadisticas');
    }
}
