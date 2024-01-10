<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = ['user_id', 'action', 'importance_level'];
    use HasFactory;
}
