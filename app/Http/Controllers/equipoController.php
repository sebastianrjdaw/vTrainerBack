<?php

namespace App\Http\Controllers;
use App\Models\Equipo;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class equipoController extends Controller
{

    public function inicio(){

        $usuario = User::find(Auth::id());
        $equipo = $usuario->equipo;
        return view('perfil.show', ['equipo' => $equipo,'usuario'=>$usuario]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos=Equipo::all();
        return view('equipo.index',['equipos'=>$equipos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario  = Auth::user();
        return view('equipo.create', ['usuario'=>$usuario]);
        
        
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
            'ubicacion'=>'required|string|min:3|max:40',
            'competicion'=>'required|string'
        ]);
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->ubicacion = $request->ubicacion;
        $equipo->competicion = $request->competicion;
        $equipo->user_id=Auth::id();
        $equipo->save();
        $usuario=User::find($equipo->entrenador_id);
        
        return view('equipo.show',['equipo'=>$equipo,'usuario'=>$usuario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
