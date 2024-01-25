<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiaSemanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia_semanas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dia_tipo_id')->unsigned();
            $table->bigInteger('semana_id')->unsigned();
            $table->dateTime('fecha');
            $table->foreign('dia_tipo_id')->references('id')->on('dia_tipos');
            $table->foreign('semana_id')->references('id')->on('semana_entrenamientos');
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
        Schema::dropIfExists('dia_semanas');
    }
}
