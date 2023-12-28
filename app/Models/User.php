<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Perfil;
use App\Models\Equipo;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function isAdmin()
    {
        return $this->rol == 'admin';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // funcion para indicar que el usuario posee un Perfil
    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }
    public function equipo()
    {
        return $this->hasOne(Equipo::class);
    }
}
