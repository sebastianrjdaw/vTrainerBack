<?php

namespace App\Http\Controllers;

use App\Models\Jornada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jornadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $jornadas=Jornada::find($user->equipo->jornadas);
        return view('jornada.index',['jornadas' => $jornadas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        $equipo=$user->equipo;
        return view('jornada.principal',['equipo'=>$equipo]);
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
            'numero'=>'required|integer',
            'fecha'=>'required|date',
            'rival'=>'required|string',
            'resultadoE'=>'required|integer|max:3',
            'resultadoR'=>'required|integer|max:3'
        ]);
        $usuario=Auth::user();
        $jornada = new Jornada();
        $jornada->numero = $request->numero;
        $jornada->fecha = $request->fecha;
        $jornada->rival = $request->rival;
        $jornada->resultadoE=$request->resultadoE;
        $jornada->resultadoR=$request->resultadoR;
        $jornada->equipo_id =$usuario->equipo->id;
        $jornada->save();
        return view('jornada.index',['jornadas'=>$usuario->equipo->jornadas]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Auth::user();
        $jornada= Jornada::find($id);
        $equipo=$user->equipo;
        return view('jornada.show',['jornada'=>$jornada,'equipo'=>$equipo]);
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
