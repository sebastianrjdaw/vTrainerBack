<?php

namespace App\Http\Controllers;

use App\Models\Entrenamiento;
use App\Models\Etiqueta;
use Illuminate\Http\Request;

class entrenamientoController extends Controller
{

   
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $entrenamientos = Entrenamiento::all();
        // $etiquetas=$this->obtenerEtiquetasDeEntrenamiento($entrenamientos) ;
        $entrenamientos = Entrenamiento::with('etiquetas')->get();

        return view('entrenamientos.index')->with('entrenamientos', $entrenamientos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entrenamiento = Entrenamiento::all();
        $etiquetas = Etiqueta::all();
        return view('entrenamientos.create', ['entrenamiento' => $entrenamiento, 'etiquetas'=>$etiquetas,]);
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
            'titulo' => 'required|min:3|max:30',
            'editor1'=> 'required|min:3'
        ]);
        $entrenamiento=new Entrenamiento();
        $entrenamiento->titulo=$request->titulo;
        $entrenamiento->cuerpo=$request->editor1;
        $entrenamiento->save();
        
        foreach ($request->etiquetas as $etiqueta){
            
            $entrenamiento->etiquetas()->attach($etiqueta);
        }

        return redirect()->route('entrenamientos.create')->with('success','Entrenamiento creado Correctamente!');
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
        return view('entrenamientos.show', ['entrenamiento' => $entrenamiento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrenamiento=Entrenamiento::find($id);
        $etiquetas = Etiqueta::all();
        return view ('entrenamientos.edit',['entrenamiento'=>$entrenamiento ,'etiquetas'=>$etiquetas]);
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
        $request->validate([
            'titulo' => 'required|min:3|max:30',
            'editor1'=> 'required|min:3|max:2000'
            
        ]);
        $entrenamiento = new Entrenamiento();
        $entrenamiento->Titulo=$request->titulo;
        $entrenamiento->cuerpo=$request->editor1;

        $entrenamiento->etiquetas()->detach();
          foreach ($request->etiquetas as $etiqueta){ 
                $entrenamiento->etiquetas()->attach($etiqueta);
        }

        $entrenamiento->save();

        return redirect()->route('entrenamientos.index')->with('success', 'Entrenamiento Actualizado!');
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

        return redirect()->route('entrenamientos.index')->with('success', 'Entrenamiento Eliminado!');
    }
}
