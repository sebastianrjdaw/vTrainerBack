<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
class perfilController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipoUsuario' => 'required|string|in:entrenador,jugador',
        ]);

        $userId = Auth::id();

        // Verificar si el usuario ya tiene un perfil
        if (Perfil::where('user_id', $userId)->exists()) {
            return response()->json(['message' => 'El usuario ya tiene un perfil.']);
        }

        $perfil = new Perfil();
        $perfil->tipoUsuario = $request->tipoUsuario;
        $perfil->user_id = $userId;

        try {
            $perfil->save();
            return response()->json(['message' => 'Perfil creado exitosamente']);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Error al crear el perfil']);
        }
    }

    public function get()
    {
        $usuario = User::find(Auth::id());
        return response()->json(['User' => $usuario]);
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
            'tipoUsuario' => 'required|in:entrenador,jugador|string',
        ]);

        $user = Auth::user();

        $perfil = $user->perfil;

        if (!$perfil) {
            return response()->json(['message' => 'Perfil no encontrado.'], 404);
        }

        $perfil->tipoUsuario = $request->tipoUsuario;
        $perfil->nombreEquipo = $request->nombreEquipo;
        $perfil->save();

        return response()->json(['message' => 'Perfil actualizado correctamente'], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
    }
}
