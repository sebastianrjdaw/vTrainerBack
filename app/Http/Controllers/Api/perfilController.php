<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jugador;
use Illuminate\Support\Facades\Auth;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
class perfilController extends Controller
{
    private function registrarJugador($codigoJugador, $userId)
    {
        // Buscar al jugador por el código proporcionado
        $jugador = Jugador::where('codigo_jugador', $codigoJugador)->first();

        // Si el jugador no existe o ya está asociado a un usuario
        if (!$jugador || $jugador->user_id) {
            return ['error' => 'Código de jugador erróneo o ya está asociado a un usuario.'];
        }

        // Asignar el user_id al jugador encontrado
        $jugador->user_id = $userId;
        $jugador->activo = true;
        $jugador->save();

        return ['success' => 'Usuario registrado como Jugador correctamente.'];
    }

    public function get()
    {
        $usuario = User::find(Auth::id());
        return response()->json(['Perfil' => $usuario->perfil]);
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

        // Control de Asociar un perfil a jugador
        if ($request->tipoUsuario == 'jugador') {

            $resultado = $this->registrarJugador($request->codigo_jugador, $userId);
            if (array_key_exists('error', $resultado)) {
                return response()->json(['message' => $resultado['error']], 404);
            }
        }

        try {
            $perfil->save();
            return response()->json(['message' => 'Perfil creado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el perfil']);
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
        return response()->json(['message', 'Perfil eliminado correctamente'], 200);
    }
}
