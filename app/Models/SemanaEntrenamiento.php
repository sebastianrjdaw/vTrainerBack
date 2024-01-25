<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
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
}
