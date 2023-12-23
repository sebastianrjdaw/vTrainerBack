<?php

namespace App\Http\Controllers;

use App\Models\EquipoEstadistica;
use App\Models\Jornada;
use App\Models\Jugador;
use App\Models\JugadorEstadistica;
use App\Models\Entrenamiento;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Client\Request;


class estadisticasController extends Controller
{

    public function rutina()
    {
        //funcion para ver la rutina semanal
        $user = Auth::user();
        $ultimaJornada = Jornada::orderBy('fecha', 'desc')->first()->id;
        $estadisticaEquipo = $this->estadisticasEquipo($ultimaJornada);


        //obtener las estadisitcas mas bajas
        $estadisticas = $estadisticaEquipo->toArray();
        asort($estadisticas);
        //empiezo en el indice 3 para ignorar los id's
        $eBajas = array_slice($estadisticas, 3, 3, true);
        foreach ($eBajas as $key => $value) {
            $nombreEstad[] = $key;
        }
        //En este bloque comparo los entenamientos cuyas etiquetas coincidan con los nombres de las estadisiticas mas bajas de la ultima jornada y los guardo en entrenamientosG
        $entrenamientos = Entrenamiento::all();
        foreach ($entrenamientos as $entrenamiento) {
            foreach ($nombreEstad as $estad) {
                if (strcasecmp($entrenamiento->etiquetas[0]->Titulo, $estad) == 0) {
                    $entrenamientosV[] = $entrenamiento;
                }
            }
        }
        //En este bloque busco algunos entrenamiento complementarios de gimanasio a traves de una API 
        $client = new Client(['base_uri'=>'http://localhost:8000/api/entrenamientos']);
        $response = $client->get('http://localhost:8000/api/entrenamientos');
        $response -> getStatusCode();
        $datos = json_decode($response->getBody(), true);
        $datos=json_decode($datos);
       

        



        if ($user->equipo->estadisticas()->count() > 0) {
            return view('entrenamientos.rutina', ['entrenamientosV' => $entrenamientosV, 'estadisticas' => $estadisticas,'entrenamientosG'=>$datos]);
        } else {
            return redirect()->route('nueva-jornada');
        }
    }

    public function principal()
    {
        //funcion para ver los datos de la vista principal
        $user = Auth::user();
        $equipo = $user->equipo;
        //Buscar la ultima jornada y ver que coincide con el equipo del ususario
        $ultimaJornada = Jornada::orderBy('fecha', 'desc')->first()->id;
         $jornada = Jornada::where('equipo_id', $equipo->id)
        ->orderBy('fecha', 'desc')
        ->first();

        if(!$jornada){
            return redirect()->route('nueva-jornada');
        }

        $estadisticaEquipo = $this->estadisticasEquipo($ultimaJornada);


        //obtener las estadisitcas mas bajas
        $estadisticas = $estadisticaEquipo->toArray();
        asort($estadisticas);
        //empiezo en el indice 3 para ignorar los id's
        $eBajas = array_slice($estadisticas, 3, 3, true);



        return view('estadisticas.principal', ['equipo' => $equipo, 'estadisticaEquipo' => $estadisticaEquipo, 'jornada' => $jornada, 'eBajas' => $eBajas]);
    }




    public function jugadoresEstadisticas($idJornada)
    {
        //funcion para ver todos los jugadores con estadisitcias
        $jugadores = Jugador::whereHas('estadisticas', function ($query) use ($idJornada) {
            $query->where('jornada_id', $idJornada);
        })->get();
        $jugadoresConEstadisticas = [];
        foreach ($jugadores as $jugador) {
            $jugadorConEstadisticas = [
                'nombre' => $jugador->nombre,
                'posicion' => $jugador->posicion,
                'dorsal' => $jugador->dorsal,
                'id' => $jugador->id
            ];
            $jugadoresConEstadisticas[] = $jugadorConEstadisticas;
            $jornada = Jornada::find($idJornada);
        }
        return view('estadisticas.estadisticasJugadorJornada', ['jugadoresConEstadisticas' => $jugadoresConEstadisticas, 'numeroJornada' => $jornada->numero]);
    }


    public function estadisiticasJugador($idJugador)
    {
        //funcion para ver las estadisitcas de cada jugador
        $jugador = Jugador::find($idJugador);
        $estadisticaJugador = JugadorEstadistica::where('jugador_id', $idJugador)->get();

        return view('estadisticas.estadisticaJugador', ['estadisticaJugador' => $estadisticaJugador, 'jugador' => $jugador]);
    }

    public function vistaEquipo($idJornada)
    {
        $estadisticaEquipo = $this->estadisticasEquipo($idJornada);
        return view('estadisticas.estadisticasEquipo', ['estadisticaEquipo' => $estadisticaEquipo]);
    }


    public function estadisticasEquipo($idJornada)
    {


        $user = Auth::user();
        $equipo = $user->equipo;
        // Obtener los jugadores del equipo que tienen estadísticas para la jornada dada
        $jugadores = Jugador::whereHas('estadisticas', function ($query) use ($idJornada) {
            $query->where('jornada_id', $idJornada);
        })->get();

        $numJugadores = $jugadores->count();

        $sumaAtaque = 0;
        $sumaDefensa = 0;
        $sumaRecepcion = 0;
        $sumaBloqueo = 0;
        $sumaSaque = 0;
        $sumaColocacion = 0;

        foreach ($jugadores as $jugador) {
            $estadisticasJugador = $jugador->estadisticas->where('jornada_id', $idJornada)->first();
            $sumaAtaque += $estadisticasJugador->ataque;
            $sumaDefensa += $estadisticasJugador->defensa;
            $sumaRecepcion += $estadisticasJugador->recepcion;
            $sumaBloqueo += $estadisticasJugador->bloqueo;
            $sumaSaque += $estadisticasJugador->saque;
            $sumaColocacion += $estadisticasJugador->colocacion;
        }

        $mediaAtaque = round($sumaAtaque / $numJugadores, 2);
        $mediaDefensa = round($sumaDefensa / $numJugadores, 2);
        $mediaRecepcion = round($sumaRecepcion / $numJugadores, 2);
        $mediaBloqueo = round($sumaBloqueo / $numJugadores, 2);
        $mediaSaque = round($sumaSaque / $numJugadores, 2);
        $mediaColocacion = round($sumaColocacion / $numJugadores, 2);



        //si no existe la estadistica la crea si no la actualiza    
        $equipoEstadisica = EquipoEstadistica::updateOrCreate(
            ['jornada_id' => $idJornada],
            [
                'equipo_id' => $equipo->id,
                'ataque' => $mediaAtaque,
                'defensa' => $mediaDefensa,
                'recepcion' => $mediaRecepcion,
                'bloqueo' => $mediaBloqueo,
                'colocacion' => $mediaColocacion,
                'saque' => $mediaSaque
            ]
        );

        return ($equipoEstadisica);
    }
}
