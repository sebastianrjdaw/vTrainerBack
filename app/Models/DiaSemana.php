<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SemanaEntrenamiento;
use App\Models\DiaTipo;
class DiaSemana extends Model
{
    use HasFactory;

    public function diaTipo(){
        return $this->belongsTo(DiaTipo::class);
    }
    public function semanaEntrenamiento(){
        return $this->belongsTo(SemanaEntrenamiento::class);
    }
}
