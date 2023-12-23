<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Entrenamiento;

class Etiqueta extends Model
{
    use HasFactory;
    protected $table = 'etiquetas'; 
    protected $primary_key='id';
    public function entrenamientos(){
        return $this->belongsToMany(Entrenamiento::class);
    }

}
