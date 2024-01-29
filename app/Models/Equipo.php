<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Jugador;
use App\Models\Jornada;
use App\Models\EquipoEstadistica;



class Equipo extends Model
{
    use HasFactory;

    public function scopeDefaults($query){
        return $query->where('user_id', null);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function jugadores(){
        return $this->hasMany(Jugador::class);
    }
    public function jornadas(){
        return $this->hasMany(Jornada::class);
    }
    public function estadisticas(){
        return $this->hasMany(EquipoEstadistica::class);
    }
}
