<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    public function entrenamientos(){
        return $this->belongsToMany(Entrenamiento::class);
    }


    //Crear una funcion scope para dar globalidad
    public function scopeFilterByPeriod($query, $equipoId, $periodo, $fecha = null)
    {
        $fechaReferencia = $fecha ? Carbon::parse($fecha) : Carbon::now();

        switch ($periodo) {
            case 'semana':
                $inicio = $fechaReferencia->startOfWeek()->toDateTimeString();
                $fin = $fechaReferencia->endOfWeek()->toDateTimeString();
                break;
            case 'mes':
                $inicio = $fechaReferencia->startOfMonth()->toDateTimeString();
                $fin = $fechaReferencia->endOfMonth()->toDateTimeString();
                break;
            case 'año':
                $inicio = $fechaReferencia->startOfYear()->toDateTimeString();
                $fin = $fechaReferencia->endOfYear()->toDateTimeString();
                break;
            default:
                // Tal vez lanzar una excepción aquí o manejarlo de alguna manera
                throw new \InvalidArgumentException('Filtro de búsqueda no válido.');
        }

        return $query->where('equipo_id', $equipoId)
                        ->whereBetween('fecha', [$inicio, $fin]);
    }

}
