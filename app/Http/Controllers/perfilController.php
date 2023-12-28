<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Finder\Finder;

class perfilController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios = User::all();
        return view('perfil.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perfil.create');
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
            'nombreEquipo' => 'required|string|min:3|max:40'
        ]);

        $userId = Auth::id();

        // Verificar si el usuario ya tiene un perfil
        if (Perfil::where('user_id', $userId)->exists()) {
            return response()->json(['message' => 'El usuario ya tiene un perfil.']);
        }

        $perfil = new Perfil();
        $perfil->tipoUsuario = $request->tipoUsuario;
        $perfil->nombreEquipo = $request->nombreEquipo;
        $perfil->user_id = $userId;

        try {
            $perfil->save();
            return response()->json(['message' => 'Perfil creado exitosamente']);
        } catch (\Exception $e) {

            return response()->json(['message' => 'Error al crear el perfil']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function get()
    {
        $usuario = User::find(Auth::id());
        $perfil = $usuario->perfil;
        return response()->json(['User' => $usuario]);
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
    public function update(Request $request)
    {
        $request->validate([
            'tipoUsuario' => 'required|in:entrenador,jugador|string',
            'nombreEquipo' => 'required|string|min:3|max:40',
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
