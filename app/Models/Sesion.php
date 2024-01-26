<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    public function entrenamientos(){
        return $this->belongsToMany(Entrenamiento::class);
    }
}
