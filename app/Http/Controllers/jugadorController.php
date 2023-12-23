<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('jugadores.index',['jugadores'=>$jugadores]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jugadores.create');
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
            'nombre'=>'required|string',
            'apellidos'=>'required|string',
            'altura'=>'required|integer',
            'posicion'=>'required|string'
        ]);
        $usuario = Auth::user();
        $jugador = new Jugador();
        $jugador->nombre = $request->nombre;
        $jugador->apellidos = $request->apellidos;
        $jugador->altura = $request->altura;
        $jugador->posicion = $request->posicion;
        $jugador->equipo_id=$usuario->equipo->id;
        $jugador->save();
        return view('jugadores.verjugadores',['usuario'=>$usuario,'jugadores'=>$usuario->equipo->jugadores,'success'=>'Ej jugador se ha añadido correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugador=Jugador::find($id);
        
        return view('jugadores.show',['jugador'=>$jugador]);
        
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
