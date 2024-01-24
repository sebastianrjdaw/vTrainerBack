<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugador;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Equipo;

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

    /**
     * Obtener los jugadores del Equipo del entrenador
     */

    public function getJugadoresEquipo(Request $request)
    {
        $equipoId = $request->user()->equipo->id;
        $jugadores = Jugador::where('equipo_id', $equipoId)->get();
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
            'posicion' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $jugador = new Jugador();
        $jugador->nombre = $request->nombre;
        $jugador->apellidos = $request->apellidos;
        $jugador->dorsal = $request->dorsal;
        $jugador->altura = $request->altura;
        $jugador->posicion = $request->posicion;
        $jugador->codigo_jugador = Str::random(10);
        $jugador->equipo_id = $request->user()->equipo->id;
        $jugador->save();
        return response()->json(['message' => 'Jugador creado correctamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $jugador = Jugador::find($request->id);
        $equipo = Equipo::find($jugador->equipo_id);
        if ($jugador) {
            return response()->json([
                'nombre' => $jugador->nombre,
                'apellidos' => $jugador->apellidos,
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
            'posicion' => 'required|string',
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
        $jugador->posicion = $request->posicion;
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
            return response()->json(['message' => 'El jugador ' . $jugador->nombre . ' se elimino correctamente'], 200);
        }
        return response()->json(['message' => 'No se encontro el jugador'], 404);
    }
}
