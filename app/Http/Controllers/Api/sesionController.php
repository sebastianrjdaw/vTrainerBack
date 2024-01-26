<?php

namespace App\Http\Controllers\Api;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sesion;
use App\Models\Equipo;
use Illuminate\Support\Facades\Validator;
class sesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesiones = Sesion::all();
        return response()->json(['sesiones' => $sesiones], 200);
    }

    /**
     * Esta funcion esta pensada para los perfiles de tipo jugador.
     * Para poder ver las sesiones de entrenamiento semanales registradas por el entrenador
     *
     * @return \Illuminate\Http\Response
     */
    public function getSesionSemanal(Request $request)
    {
        try {
            // Obtener el ID del equipo del usuario
            $equipoId = $request->user()->jugador->equipo->id;

            // Definir el rango de fechas para la semana actual y la semana siguiente
            $fechaInicioSemanaActual = Carbon::now()->startOfWeek()->toDateString();
            $fechaInicioSemanaSiguiente = Carbon::now()->addWeek()->startOfWeek()->toDateString();
    
            // Obtener las sesiones de la semana actual
            $sesionesSemanaActual = Sesion::with('entrenamientos')
                                    ->filterByPeriod($equipoId, 'semana', $fechaInicioSemanaActual)
                                    ->get();
    
            // Obtener las sesiones de la semana siguiente
            $sesionesSemanaSiguiente = Sesion::with('entrenamientos')
                                        ->filterByPeriod($equipoId, 'semana', $fechaInicioSemanaSiguiente)
                                        ->get();
    
            // Verificar si se encontraron sesiones
            if ($sesionesSemanaActual->isEmpty() && $sesionesSemanaSiguiente->isEmpty()) {
                return response()->json(['message' => 'No se encontraron sesiones para las semanas seleccionadas.'], 404);
            }
    
            return response()->json([
                'sesionesSemanaActual' => $sesionesSemanaActual,
                'sesionesSemanaSiguiente' => $sesionesSemanaSiguiente
            ]);
    
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al buscar las sesiones.'], 500);
        }
    }
    
    /**
     * Devuelve las fechas segun el filtro inidicado
     *
     * @return \Illuminate\Http\Response
     */
    public function sesionFiltro(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'filtro' => 'required|in:semana,mes,año',
            'fecha' => 'sometimes|date', // 'sometimes' indica que el campo no es obligatorio
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $sesiones = Sesion::filterByPeriod($request->user()->equipo->id, $request->filtro, $request->fecha)->get();

            if ($sesiones->isEmpty()) {
                return response()->json(['message' => 'No se encontraron sesiones para el período seleccionado.'], 404);
            }

            return response()->json(['sesiones' => $sesiones]);
        } catch (\InvalidArgumentException $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
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
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date',
            'hora_fin' => 'required|date|after:hora_inicio',
            'entrenamientos' => 'required|array',
            'entrenamientos.*' => 'required|distinct|exists:entrenamientos,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Comprobar si ya existe una sesión con los mismos datos
        $sesionExistente = Sesion::where('fecha', $request->fecha)
            ->where('hora_inicio', $request->hora_inicio)
            ->where('hora_fin', $request->hora_fin)
            ->where('equipo_id', $request->user()->equipo->id)
            ->first();

        if ($sesionExistente) {
            return response()->json(['message' => 'Ya existe una sesión con los mismos datos.'], 409);
        }

        $sesion = new Sesion();
        $sesion->equipo_id = $request->user()->equipo->id;
        $sesion->fecha = $request->fecha;
        $sesion->hora_inicio = $request->hora_inicio;
        $sesion->hora_fin = $request->hora_fin;
        $sesion->save();

        if (is_array($request->entrenamientos)) {
            foreach ($request->entrenamientos as $entrenamientoId) {
                $sesion->entrenamientos()->attach($entrenamientoId);
            }
        }

        return response()->json(['message' => 'Sesión registrada correctamente'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $sesion = Sesion::with('entrenamientos')->find($request->id);
        $equipo = Equipo::find($sesion->equipo_id);
        return response()->json(
            [
                'sesion' => $sesion,
                'equipo' => $equipo->nombre, // Asegúrate de que tu modelo Equipo tiene un atributo 'nombre'
            ],
            200,
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hora_inicio' => 'required|date',
            'hora_fin' => 'required|date|after:hora_inicio',
            'entrenamientos' => 'required|array',
            'entrenamientos.*' => 'required|distinct|exists:entrenamientos,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $sesion = Sesion::find($request->id);

        if (!$sesion) {
            return response()->json(['message' => 'Sesión no encontrada.'], 404);
        }

        // Actualizar la hora de inicio y fin de la sesión
        $sesion->hora_inicio = $request->hora_inicio;
        $sesion->hora_fin = $request->hora_fin;
        $sesion->save();

        // Desasignar todos los entrenamientos existentes
        $sesion->entrenamientos()->detach();

        // Reasignar los entrenamientos en el nuevo orden
        if (is_array($request->entrenamientos)) {
            foreach ($request->entrenamientos as $entrenamientoId) {
                $sesion->entrenamientos()->attach($entrenamientoId);
            }
        }

        return response()->json(['message' => 'Sesión actualizada correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $sesion = Sesion::find($request->id);
        $sesion->delete();

        return response()->json(['message'=>'Sesion eliminada correctamente'],200);
    }
}
