<?php

use App\Http\Controllers\Api\Auth\LoginApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisteredUserApiController;
use App\Http\Controllers\perfilController;

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

    //
});
