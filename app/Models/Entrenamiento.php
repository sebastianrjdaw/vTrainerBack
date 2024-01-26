<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etiqueta;


class Entrenamiento extends Model
{
    use HasFactory;
    protected $table = 'entrenamientos'; 
    protected $primary_key='id';
    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class);
    }
    public function sesiones(){
        return $this->belongsToMany(Sesion::class);
    }
}
