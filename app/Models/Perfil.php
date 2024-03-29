<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Jugador;

class Perfil extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jugador(){
        return $this->hasOne(Jugador::class, 'user_id');
    }
}
