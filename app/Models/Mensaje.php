<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $fillable = ['user_id', 'tipo', 'mensaje'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
