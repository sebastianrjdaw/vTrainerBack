<?php

namespace App\Providers;

use Illuminate\Support\Facades\View; 
use Illuminate\Support\ServiceProvider;
use App\Models\Mensaje;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $cantidadMensajesNoLeidos = Mensaje::where('estado', 0)->count();
            $view->with('cantidadMensajesNoLeidos', $cantidadMensajesNoLeidos);
        });
    }
}
