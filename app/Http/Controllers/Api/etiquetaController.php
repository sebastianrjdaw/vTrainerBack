<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class etiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = Etiqueta::all();
        return response()->json([$etiquetas]);
    }

    public function getEtiquetasDefaults()
    {
        $etiquetas = Etiqueta::where('created_by', null)->get();
        return response()->json($etiquetas);
    }

    public function getEtiquetasUser(Request $request)
    {
        $user = $request->user();
        $etiquetas = Etiqueta::where('created_by', $user->id)->get();
        return response()->json($etiquetas);
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
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $etiqueta = new Etiqueta();
        $etiqueta->titulo = $request->titulo;
        $etiqueta->created_by = $request->user()->id;
        $etiqueta->save();

        return response()->json(['message' => 'Etiqueta creada correctamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etiqueta = Etiqueta::find($id);
        return response()->json($etiqueta);
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
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $etiqueta = Etiqueta::find($id);
        $etiqueta->titulo = $request->titulo;
        $etiqueta->save();

        return response()->json(['message' => 'Etiqueta actualizada correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etiqueta = Etiqueta::find($id);
        $etiqueta->delete();

        return response()->json(['message' => 'Etiqueta eliminada correctamente']);
    }
}
