<?php

namespace App\Http\Controllers;

use App\Models\JugadorEstadistica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jugadorEstadisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $jugadores = $user->equipo->jugadores;
        $jornada = $user->equipo->jornadas;
        $jugadorEstadisticas = JugadorEstadistica::all();
        return view('jugadorEstadistica.index',['jugadorEstadisticas'=>$jugadorEstadisticas,'jugadores'=>$jugadores,'jornada'=>$jornada]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        $jornadas =$user->equipo->jornadas;
        $jugadores=$user->equipo->jugadores;
        return view('jugadorEstadistica.create',['jornadas'=>$jornadas,'jugadores'=>$jugadores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user=Auth::user();
        $request->validate([
            'ataque' => 'required|integer|min:1|max:10',
            'defensa' => 'required|integer|min:1|max:10',
            'recepcion' => 'required|integer|min:1|max:10',
            'bloqueo' => 'required|integer|min:1|max:10',
            'colocacion' => 'required|integer|min:1|max:10',
            'saque' => 'required|integer|min:1|max:10',  
        ]);
        $jugadorEstadistica = new JugadorEstadistica();
        $jugadorEstadistica->ataque = $request->ataque;
        $jugadorEstadistica->defensa = $request->defensa;
        $jugadorEstadistica->recepcion = $request->recepcion;
        $jugadorEstadistica->bloqueo = $request->bloqueo;
        $jugadorEstadistica->colocacion = $request->colocacion;
        $jugadorEstadistica->saque = $request->saque;
        $jugadorEstadistica->jornada_id =$request->jornadaId;
        $jugadorEstadistica->jugador_id =$request->jugadorId;
        $jugadorEstadistica->save();
        $jugadores=$user->equipo->jugadores;
        $jugadorEstadisticas = JugadorEstadistica::all();
        
        
        return view('jugadorEstadistica.index',['jugadorEstadisticas'=>$jugadorEstadisticas,'jugadores'=>$jugadores]);

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
