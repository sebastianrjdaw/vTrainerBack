<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jornada;
use App\Models\Equipo;


class EquipoEstadistica extends Model
{
    use HasFactory;

    protected $fillable =[
        'jornada_id',
        'equipo_id',
        'ataque',
        'defensa',
        'recepcion',
        'bloqueo',
        'saque',
        'colocacion'
    ];


    public function jornada(){
        return $this->belongsTo(Jornada::class);
    }
    public function jugador(){
        return $this->belongsTo(Equipo::class);
    }

}
