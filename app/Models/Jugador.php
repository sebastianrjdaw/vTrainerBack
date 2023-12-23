<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;
use App\Models\JugadorEstadistica;


class Jugador extends Model
{
    use HasFactory;

    public function equipo(){
        return $this->belongsTo(Equipo::class);
    }
    public function estadisticas(){
        return $this->hasMany(JugadorEstadistica::class);
    }
}
