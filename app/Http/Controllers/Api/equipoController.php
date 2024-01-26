<?php

namespace App\Http\Controllers\Api;
use App\Models\Equipo;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $equipos = Equipo::where('user_id', null)->get();
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
            'ubicacion' => 'required|string|min:3|max:40',
            'competicion' => 'required|string',
        ]);
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->ubicacion = $request->ubicacion;
        $equipo->competicion = $request->competicion;
        $equipo->user_id = $request->user()->id;
        $equipo->save();
        // $usuario=User::find($equipo->entrenador_id);

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
