<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\DiaTipo;
class SemanaEntrenamiento extends Model
{
    use HasFactory;
    protected $table = 'semana_entrenamientos';

    public function entrenador(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function diaSemana(){
        return $this->hasMany(DiaSemana::class, 'semana_id');
    }

    public function crearDias(){
        $diasTipo = DiaTipo::all();
        $i = 0;
        foreach ($diasTipo as $diaTipo){
            $diaEntrenamiento  = new DiaSemana();
            $diaEntrenamiento->dia_tipo_id = $diaTipo->id;
            $diaEntrenamiento->semana_id = $this->id;
            $diaEntrenamiento->fecha = sumarDias($this->fecha_inicio, $i);
            $diaEntrenamiento->save();
        }
    }
}
