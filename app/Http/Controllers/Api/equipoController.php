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
        return response()->json(['equipos'=>$equipos]);
    }

    /**
     * Mostrar los equipos Federados Predefinidos
     * 
     */

    public function getDefaults(){
        $equipos = Equipo::where('user_id',null)->get();
        return response()->json(['equiposDefaults'=>$equipos]);
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
        $equipo->user_id=$request->user()->id;
        $equipo->save();
        // $usuario=User::find($equipo->entrenador_id);
        
        return response()->json(['message'=>'Equipo Creado correctamente', 200]);
    }


    /**
     * Funcion para asignar un entrenador a los equipos prestablecidos
     *
     * @param Request $request
     * @return void
     */
    public function setUserEquipo(Request $request){
        $equipo = Equipo::find($request->id);
        $user = $request->user();
        $equipo->user_id = $user->id;
        $equipo->save();
        return response()->json(['message'=>'Entrenador asignado correctamente','equipo'=>$equipo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $usuario = User::find(Auth::id());
        $equipo = $usuario->equipo;
        if($equipo){
            return response()->json(['equipo'=>$equipo]);
        }

        return response()->json(['message'=>'No hay un equipo asociado']);

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
