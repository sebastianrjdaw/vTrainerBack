<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entrenamiento;
use App\Models\Etiqueta;
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
        $entrenamientos = Entrenamiento::with('etiquetas')->get();
        return response()->json([$entrenamientos]);
    }

    public function getEntrenamientosDefaults()
    {
        $entrenamientos = Entrenamiento::with('etiquetas')
            ->where('user_id', null)
            ->get();

        $entrenamientosTransformados = $entrenamientos->map(function ($entrenamiento) {
            // Extraer solo los campos necesarios de las etiquetas
            $etiquetasTransformadas = $entrenamiento->etiquetas->map(function ($etiqueta) {
                return [
                    'id' => $etiqueta->id,
                    'titulo' => $etiqueta->titulo,
                ];
            });

            return [
                'id' => $entrenamiento->id,
                'titulo' => $entrenamiento->titulo,
                'cuerpo' => $entrenamiento->cuerpo,
                'etiquetas' => $etiquetasTransformadas,
            ];
        });

        return response()->json(['entrenamientos' => $entrenamientosTransformados]);
    }

    public function getEntrenamientosUser(Request $request)
    {
        $user = $request->user();
        $entrenamientos = Entrenamiento::where('user_id', $user->id)->get();

        
        $entrenamientosTransformados = $entrenamientos->map(function ($entrenamiento) {
            // Extraer solo los campos necesarios de las etiquetas
            $etiquetasTransformadas = $entrenamiento->etiquetas->map(function ($etiqueta) {
                return [
                    'id' => $etiqueta->id,
                    'titulo' => $etiqueta->titulo,
                ];
            });

            return [
                'id' => $entrenamiento->id,
                'titulo' => $entrenamiento->titulo,
                'cuerpo' => $entrenamiento->cuerpo,
                'etiquetas' => $etiquetasTransformadas,
                'editable' => isset($entrenamiento->user_id)
            ];
        });

        return response()->json(['entrenamientos' => $entrenamientosTransformados]);
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
            'etiquetas' => 'array',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $entrenamiento = new Entrenamiento();
        $entrenamiento->titulo = $request->titulo;
        $entrenamiento->cuerpo = $request->cuerpo;
        $entrenamiento->user_id = $request->user()->id;
        
        // Primero, guarda el Entrenamiento
        $entrenamiento->save();
    
        // Después de guardar, el Entrenamiento tiene un ID asignado y puedes adjuntar las etiquetas
        foreach ($request->etiquetas as $etiqueta) {
            $entrenamiento->etiquetas()->attach($etiqueta);
        }
    
        return response()->json(['message' => 'Entrenamiento creado correctamente'], 200);
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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string',
            'cuerpo' => 'required|string',
            'etiquetas' => 'array', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $entrenamiento = Entrenamiento::find($request->id);
        
        if (!$entrenamiento) {
            return response()->json(['message' => 'Entrenamiento no encontrado'], 404);
        }

        if($entrenamiento->user_id == null){
            return response()->json(['message' => 'Entrenamiento no es editable'], 404);
        }

        $entrenamiento->titulo = $request->titulo;
        $entrenamiento->cuerpo = $request->cuerpo;
        $entrenamiento->user_id = $request->user()->id;

        // Usar sync para actualizar las etiquetas sin duplicados
        $entrenamiento->etiquetas()->sync($request->etiquetas ?? []);

        $entrenamiento->save();

        return response()->json(['message' => 'Entrenamiento actualizado correctamente'], 200);
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

        return response()->json(['message' => 'Entrenamiento eliminado correctamente'], 200);
    }
}
