<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jornada;
use App\Models\Jugador;


class JugadorEstadistica extends Model
{
    use HasFactory;

    public function jornada(){
        return $this->belongsTo(Jornada::class);
    }
    public function jugador(){
        return $this->belongsTo(Jugador::class);
    }

}
    