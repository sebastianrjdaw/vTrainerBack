<?php

use App\Http\Controllers\userLogController;
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
        return view('admin.adminIndex');
    });
                
    Route::resource('users', userController::class);
    Route::get('/user-logs',[userLogController::class, 'index']);
});






// //Verificacion que el usuario tiene equipo Creado
// Route::get('/mi-equipo', function () {
//     $user = Auth::user();
//     if ($user->equipo) {
//         return view('equipo.show', ['usuario' => $user, 'perfil' => $user->perfil, 'equipo' => $user->equipo]);
//     }
//     return view('equipo.create', ['usuario' => $user, 'perfil' => $user->perfil]);
// });

// //Verificacion si el equipo tiene jugadores
// Route::get('/verjugadores', function () {
//     $user = Auth::user();
//     if ($user->equipo->jugadores) {
//         return view('jugadores.verjugadores', ['usuario' => $user, 'perfil' => $user->perfil, 'equipo' => $user->equipo, 'jugadores' => $user->equipo->jugadores]);
//     }
//     return view('equipo.create', ['usuario' => $user, 'perfil' => $user->perfil]);
// });


//Gestion de Multi-Idioma
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('idioma');







// Route::middleware(['auth'])->group(function () {
//     Route::resource('etiquetas', etiquetaController::class);
//     Route::resource('entrenamientos', entrenamientoController::class);
//     Route::resource('perfil', perfilController::class);
//     Route::resource('equipo', equipoController::class);
//     route::resource('jugadores', jugadorController::class);
//     route::resource('jornada', jornadaController::class);
//     route::resource('jugadorEstadistica', jugadorEstadisticaController::class);



//     Route::get('/nuevajornada', [jornadaController::class, 'create'])->name('nueva-jornada');
//     Route::get('/jugadores.create', [jugadorController::class, 'create']);
//     Route::get('/perfil', [perfilController::class, 'ver']);
//     Route::get('/jugadoresStats/{id}', [estadisticasController::class, 'jugadoresEstadisticas']);
//     Route::get('/estadisticaJugador/{id}', [estadisticasController::class, 'estadisiticasJugador']);
//     Route::get('/estadisticasEquipo/{id}', [estadisticasController::class, 'vistaEquipo']);
//     Route::get('/principal', [estadisticasController::class, 'principal']);
//     Route::get('/rutina', [estadisticasController::class, 'rutina']);
// });


// Route::middleware(['admin'])->group(function () {
//     Route::get('/todosPerfiles', [perfilController::class, 'index']);
//     Route::get('/crearEtiquetas', [etiquetaController::class, 'index']);
// });

require __DIR__ . '/auth.php';
