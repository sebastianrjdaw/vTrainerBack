<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipo;
use Carbon\Carbon;
use App\Models\Jugador;
use App\Models\Posicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class jugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores = Jugador::All();
        return response()->json(['jugadores' => $jugadores], 200);
    }

    public function getPosiciones()
    {
        $posiciones = Posicion::all();
        return response()->json(['posiciones' => $posiciones]);
    }

    /**
     * Obtener los jugadores del Equipo del entrenador
     */

    public function getJugadoresEquipo(Request $request)
    {
        $equipoId = $request->user()->equipo->id;
        $jugadores = Jugador::with('posicion')->where('equipo_id', $equipoId)->get();
        if ($jugadores) {
            return response()->json(['jugadores' => $jugadores], 200);
        }
        return response()->json(['No tienes jugadores en tu equipo']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dorsal' => 'required|integer',
            'altura' => 'required|numeric',
            'posicion_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jugador = new Jugador();
        $jugador->nombre = $request->nombre;
        $jugador->apellidos = $request->apellidos;
        $jugador->dorsal = $request->dorsal;
        $jugador->altura = $request->altura;
        $jugador->posicion_id = $request->posicion_id;
        //Todo Hashear el cod_jugador para evitar que haya duplicados
        $jugador->codigo_jugador = Str::random(10);
        $timestamp = Carbon::now()->timestamp;
        $codigoJugador = $request->user()->equipo->id . $timestamp;
        // Asigna el código único al jugador
        $jugador->codigo_jugador = $codigoJugador;

        $jugador->equipo_id = $request->user()->equipo->id;
        $jugador->save();
        return response()->json([$jugador], 200);
    }

    /**
     *
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $jugador = Jugador::with('posicion')->find($request->id);
        $equipo = Equipo::find($jugador->equipo_id);
        if ($jugador) {
            return response()->json([
                'nombre' => $jugador->nombre,
                'apellidos' => $jugador->apellidos,
                'poscion' => $jugador->posicion->nombre,
                'dorsal' => $jugador->dorsal,
                'altura' => $jugador->altura,
                'equipo' => $equipo->nombre,
            ]);
        }
        return response()->json(['message' => 'Jugador no encontrado'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dorsal' => 'required|integer',
            'altura' => 'required|numeric',
            'posicion_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Buscar el jugador existente por ID
        $jugador = Jugador::find($request->id);
        if (!$jugador) {
            return response()->json(['error' => 'Jugador no encontrado'], 404);
        }

        // Actualizar los datos del jugador
        $jugador->nombre = $request->nombre;
        $jugador->apellidos = $request->apellidos;
        $jugador->dorsal = $request->dorsal;
        $jugador->altura = $request->altura;
        $jugador->posicion_id = $request->posicion_id;
        $jugador->save();

        return response()->json(['message' => 'Datos de jugador actualizados correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $jugador = Jugador::find($request->id);
        if ($jugador) {
            if ($jugador->activo) {
                return response()->json(['message' => 'No se puede eliminar un jugador activo'], 404);
            }
            $jugador->delete();
            return response()->json(['message' => 'El jugador ' . $jugador->nombre . ' se elimino correctamente'], 200);
        }
        return response()->json(['message' => 'No se encontro el jugador'], 404);
    }
}
