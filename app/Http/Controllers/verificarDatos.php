<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class verificarDatos extends Controller
{
    public function verificarDatos(Request $request){
        $validado = $request->validate([
            'nombre' => 'required|alpha',
            'email' => 'required',
            'asunto'=> 'required',
            'mensaje'=>'required',
        ]);
        Auth::login($usuario = User::create([
            'nombre' => $request->name,
            'email' => $request->email,
        ]));
    }
}
