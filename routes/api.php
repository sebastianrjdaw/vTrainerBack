<?php

use App\Http\Controllers\Common\mensajeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginApiController;
use App\Http\Controllers\Api\Auth\RegisteredUserApiController;
use App\Http\Controllers\Api\perfilController;
use App\Http\Controllers\Api\equipoController;
use App\Http\Controllers\Api\jugadorController;



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

    //Control de envios de mensajes
    Route::post('create-mensaje',[MensajeController::class, 'store']);

    //Control de usuarios Jugadores
    Route::middleware('jugador.perfil')->group(function(){
        Route::get('jugador-prueba', function (){
            return response()->json(['message'=>'eres un jugador']);
        });
    });

    //Control de usuarios Entrenadores
    Route::middleware('entrenador.perfil')->group(function(){
        Route::get('entrenador-prueba', function (){
            return response()->json(['message'=>'eres un entrenador']);
        });

        //Control de Equipos
        Route::get('equipos', [equipoController::class , 'index']);
        Route::get('mi-equipo',[equipoController::class, 'show']);
        Route::post('create-equipo', [equipoController::class, 'store']);
        Route::post('set-entrenador-equipo', [equipoController::class , 'setUserEquipo']);
        
        //Control de Jugadores
        Route::get('jugadores', [jugadorController::class, 'index']);
        Route::get('jugador', [jugadorController::class, 'show']);
        Route::post('create-jugador', [jugadorController::class, 'store']);
        Route::post('update-jugador', [jugadorController::class, 'update']);
    });

});
