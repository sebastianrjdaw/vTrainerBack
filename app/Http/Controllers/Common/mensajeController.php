<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensaje;

class mensajeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $mensajes = Mensaje::all();
        return view('admin.mensajes.index', ['mensajes' => $mensajes]);
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
            'tipo' => 'required|string',
            'mensaje' => 'required|string',
        ]);

        Mensaje::create([
            'user_id' => auth()->id(),
            'tipo' => $request->tipo,
            'mensaje' => $request->mensaje,
        ]);

        return response()->json(['message' => 'Mensaje enviado correctamente'], 200);
    }

    public function marcarComoLeido($mensajeId)
    {
        $mensaje = Mensaje::find($mensajeId);
        if ($mensaje) {
            $mensaje->estado = 1;
            $mensaje->save();
            return back()->with('success', 'Mensaje marcado como leído.');
        }

        return back()->with('error', 'Mensaje no encontrado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $mensaje = Mensaje::find($id);
        return view('admin.mensaje.show', ['mensaje' => $mensaje]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $mensaje = Mensaje::find($id);
        $mensaje->delete();
        return redirect()->route('users.mensajes.index')->with('success', 'Mensaje eliminado exitosamente.');
    }
}
