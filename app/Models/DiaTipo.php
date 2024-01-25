<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaTipo extends Model
{
    use HasFactory;

    public function diaSemana(){
        return $this->hasMany(DiaSemana::class, 'dia_tipo_id');
    }
}
