<?php

namespace App\Http\Controllers\Api;

use App\Models\Equipo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class equipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::all();
        return response()->json(['equipos' => $equipos]);
    }

    /**
     * Mostrar los equipos Federados Predefinidos
     *
     */

    public function getDefaults()
    {
        $equipos = Equipo::defaults()->get();

        return response()->json(['equiposDefaults' => $equipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:3|max:30',
            'ubicacion' => 'required|string|min:2|max:40',
            'competicion' => 'required|string',
        ]);
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->ubicacion = $request->ubicacion;
        $equipo->competicion = $request->competicion;
        $equipo->user_id = $request->user()->id;
        $equipo->save();

        return response()->json(['message' => 'Equipo Creado correctamente', 200]);
    }

    /**
     * Funcion para asignar un entrenador a los equipos prestablecidos
     *
     * @param Request $request
     * @return void
     */
    public function setUserEquipo(Request $request)
    {
        $equipo = Equipo::find($request->id);
        $user = $request->user();
        $equipo->user_id = $user->id;
        $equipo->save();
        return response()->json(['message' => 'Entrenador asignado correctamente', 'equipo' => $equipo]);
    }

    /**
     * Devolver el equipo del jugador o del entrenador.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $usuario = $request->user();

        // Intenta obtener el equipo directamente asociado al usuario (caso de los entrenadores)
        $equipo = $usuario->equipo;

        // Si no se encuentra un equipo directamente, busca a través del perfil de jugador
        if (!$equipo) {
            $jugador = $usuario->jugador;
            if ($jugador) {
                $equipo = $jugador->equipo;
            }
        }

        // Verifica si se encontró un equipo, ya sea directamente o a través del perfil de jugador
        if ($equipo) {
            return response()->json(['equipo' => $equipo]);
        } else {
            return response()->json(['message' => 'No hay un equipo asociado al usuario.'], 404);
        }
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
        $request->validate([
            'nombre' => 'required|string|min:3|max:30',
            'ubicacion' => 'required|string|min:2|max:40',
            'competicion' => 'required|string'
        ]);

        $equipo = Equipo::find($request->user()->equipo->id);
        $equipo->nombre = $request->nombre;
        $equipo->ubicacion = $request->ubicacion;
        $equipo->competicion = $request->competicion;
        $equipo->save();

        return response()->json(['message' => 'Informacion del Equipo actualizada correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $equipo = Equipo::find($request->id);

        // Verifica si el equipo es por defecto
        if ($equipo && $equipo->user_id === null) {
            return response()->json(['message' => 'No se puede eliminar un equipo por defecto.'], 403);
        }

        // Si no es un equipo por defecto, procede a eliminarlo
        if ($equipo) {
            $equipo->delete();
            return response()->json(['message' => 'Equipo eliminado correctamente']);
        }

        // Si el equipo no existe
        return response()->json(['message' => 'Equipo no encontrado.'], 404);
    }
}
