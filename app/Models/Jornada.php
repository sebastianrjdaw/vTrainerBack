<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;
use App\Models\JugadorEstadistica;
use App\Models\EquipoEstadistica;


class Jornada extends Model
{
    use HasFactory;

    public function estadisticasJugador(){
        return $this->hasMany(JugadorEstadistica::class);
    }

    public function estadisticasEquipo(){
        return $this->hasOne(EquipoEstadistica::class);
    }
}
