<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;
use App\Models\JugadorEstadistica;
use App\Models\User;


class Jugador extends Model
{
    use HasFactory;

    public function equipo(){
        return $this->belongsTo(Equipo::class);
    }
    public function estadisticas(){
        return $this->hasMany(JugadorEstadistica::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function posicion(){
        return $this->belongsTo(Posicion::class);
    }
}
