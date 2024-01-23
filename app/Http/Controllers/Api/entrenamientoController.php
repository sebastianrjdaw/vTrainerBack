<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entrenamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class entrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrenamientos = Entrenamiento::all();
        return response()->json([$entrenamientos]);
    }

    public function getEntrenamientosDefaults(){
        $entrenamientos = Entrenamiento::where('created_by',0)->get();

        return response()->json(['entrenamientos',$entrenamientos]);
    }

    public function getEntrenemientosUser(Request $request){
        $user = $request->user();
        $entrenamientos = Entrenamiento::where('created_by',$user->id);

        return response()->json(['entrenamientos', $entrenamientos]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string',
            'cuerpo' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $entrenamiento = new Entrenamiento();
        $entrenamiento->titulo = $request->titulo;
        $entrenamiento->cuerpo = $request->cuerpo;
        $entrenamiento->created_by = $request->user()->id;
        foreach ($request->etiquetas as $etiqueta){
            $entrenamiento->etiquetas()->attach($etiqueta);
        }
        $entrenamiento->save();

        return response()->json(['message'=>'Etiqueta creada correctamente'],200); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrenamiento = Entrenamiento::find($id);

        return response()->json([$entrenamiento]);
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
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string',
            'cuerpo' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $entrenamiento = new Entrenamiento();
        $entrenamiento->titulo = $request->titulo;
        $entrenamiento->cuerpo = $request->cuerpo;
        $entrenamiento->created_by = $request->user()->id;
        foreach ($request->etiquetas as $etiqueta){
            $entrenamiento->etiquetas()->attach($etiqueta);
        }
        $entrenamiento->save();

        return response()->json(['message'=>'Entrenamiento creado correctamente'],200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entrenamiento = Entrenamiento::find($id);
        $entrenamiento->etiquetas()->detach();
        $entrenamiento->delete();

        return response()->json(['message'=>'Entrenamiento eliminado correctamente'],200); 

    }
}
