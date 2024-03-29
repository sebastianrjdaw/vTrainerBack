<?php

use App\Http\Controllers\Common\mensajeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Api\Auth\RegisteredUserApiController;
use App\Http\Controllers\Api\perfilController;
use App\Http\Controllers\Api\equipoController;
use App\Http\Controllers\Api\jugadorController;
use App\Http\Controllers\Api\entrenamientoController;
use App\Http\Controllers\Api\etiquetaController;
use App\Http\Controllers\Api\sesionController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response()->json(['message' => 'Servidor Funcionando']);
});

Route::post('/register', [RegisteredUserApiController::class, 'store']);
Route::post('/login', [LoginApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    //Control del perfil
    Route::post('set-perfil', [perfilController::class, 'store']);
    Route::post('update-perfil', [perfilController::class, 'update']);
    Route::get('get-perfil', [perfilController::class, 'get']);


    //Controles comunes
    Route::get('mi-equipo', [equipoController::class, 'show']);
    Route::get('sesiones-user', [sesionController::class, 'getUserSesions']);
    //Control de envios de mensajes
    Route::post('create-mensaje', [MensajeController::class, 'store']);


    //Control de usuarios Jugadores
    Route::middleware('jugador.perfil')->group(function () {
        Route::get('sesiones-semana', [sesionController::class, 'getSesionSemanal']);
        Route::get('user-jugador', [jugadorController::class, 'show']);
    });

    //Control de usuarios Entrenadores
    Route::middleware('entrenador.perfil')->group(function () {
        Route::get('entrenador-prueba', function () {
            return response()->json(['message' => 'eres un entrenador']);
        });

        //Control de Equipos
        Route::get('equipos', [equipoController::class, 'index']);
        Route::get('equipos-defaults', [equipoController::class, 'getDefaults']);
        Route::post('create-equipo', [equipoController::class, 'store']);
        Route::post('update-equipo', [equipoController::class, 'update']);
        Route::post('set-entrenador-equipo', [equipoController::class, 'setUserEquipo']);

        //Control de Jugadores
        Route::get('jugadores', [jugadorController::class, 'index']);
        Route::get('jugador', [jugadorController::class, 'show']);
        Route::get('jugadores-equipo', [jugadorController::class, 'getJugadoresEquipo']);
        Route::get('posiciones', [jugadorController::class, 'getPosiciones']);
        Route::post('create-jugador', [jugadorController::class, 'store']);
        Route::post('update-jugador', [jugadorController::class, 'update']);
        Route::post('delete-jugador', [jugadorController::class, 'destroy']);


        //Control de Entrenamientos
        Route::get('entrenamientos', [entrenamientoController::class, 'index']);
        Route::get('entrenamientos-defaults', [entrenamientoController::class, 'getEntrenamientosDefaults']);
        Route::get('entrenamientos-user', [entrenamientoController::class, 'getEntrenamientosUser']);
        Route::post('create-entrenamiento', [entrenamientoController::class, 'store']);
        Route::post('update-entrenamiento', [entrenamientoController::class, 'update']);
        Route::post('delete-entrenamiento', [entrenamientoController::class, 'destroy']);



        //Control de Etiquetas
        Route::get('etiquetas', [etiquetaController::class, 'index']);
        Route::get('etiquetas-defaults', [etiquetaController::class, 'getEtiquetasDefaults']);
        Route::get('etiquetas-user', [etiquetaController::class, 'getetiquetasUser']);
        Route::post('create-etiqueta', [etiquetaController::class, 'store']);

        //Control de SesionesEntrenamietos
        Route::post('create-sesion', [sesionController::class, 'store']);
        Route::post('update-sesion', [sesionController::class, 'update']);
        Route::get('sesiones', [sesionController::class, 'index']);
        Route::get('sesion', [sesionController::class, 'show']);

        Route::get('sesion-filtro', [sesionController::class, 'sesionFiltro']);
    });
});
