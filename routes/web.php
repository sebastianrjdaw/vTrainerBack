<?php

use App\Http\Controllers\Common\mensajeController;
use App\Http\Controllers\userLogController;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\etiquetaController;
use App\Http\Controllers\entrenamientoController;
use App\Http\Controllers\equipoController;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\jugadorController;
use App\Http\Controllers\jornadaController;
use App\Http\Controllers\jugadorEstadisticaController;
use App\Http\Controllers\estadisticasController;
use App\Http\Controllers\userController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;







//Entrada sin registro
Route::get('/', function () {
    return view('invitado');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        $cantidadMensajesNoLeidos = Mensaje::where('estado', 0)->count();
        return view('admin.adminIndex', ['cantidadMensajesNoLeidos' => $cantidadMensajesNoLeidos]);
    });
                
    Route::resource('users', userController::class);
    Route::get('/user-logs',[userLogController::class, 'index']);
    Route::get('/mensajes', [MensajeController::class, 'index'])->name('mensajes.index');
    Route::get('/mensajes/{mensaje}', [MensajeController::class, 'show'])->name('mensajes.show');
//    Route::post('/mensajes/{mensaje}/destroy', [MensajeController::class, 'destroy'])->name('mensajes.destroy');
    Route::delete('/mensajes/{mensaje}', [mensajeController::class, 'destroy'])->name('mensajes.destroy');

});

//Gestion de Multi-Idioma
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('idioma');


require __DIR__ . '/auth.php';
