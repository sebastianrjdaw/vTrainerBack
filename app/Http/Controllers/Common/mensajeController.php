<?php
namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mensaje;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MensajeController extends Controller
{
    public function index()
    {
        $mensajes = Mensaje::all();
        return view('admin.mensajes.index', ['mensajes' => $mensajes]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo' => 'required|string',
            'mensaje' => 'required|string',
        ]);

        Mensaje::create($validatedData + ['user_id' => auth()->id()]);
        return response()->json(['message' => 'Mensaje enviado correctamente'], 200);
    }

    private function marcarComoLeido($mensajeId)
    {
        try {
            $mensaje = Mensaje::findOrFail($mensajeId);
            $mensaje->estado = 1;
            $mensaje->save();
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Mensaje no encontrado.');
        }
    }

    public function show($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $this->marcarComoLeido($id);
        return view('admin.mensajes.show', ['mensaje' => $mensaje]);
    }

    public function destroy($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->delete();
        return redirect()->route('mensajes.index')->with('success', 'Mensaje eliminado exitosamente.');
    }
}
