<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $datos = ['jugador', 'entrenador'];
        foreach ($datos as $dato) {
            DB::table('users')->insert([

                'name' => $dato,
                'email' => $dato . '@' . $dato . '.com',
                'rol' => 'usuario',
                'password' => Hash::make($dato)
            ]);
            if ($dato == 'entrenador') {
                DB::table('perfils')->insert([
                    'user_id' => 3,
                    'esPremium' => 0,
                    'tipoUsuario' => 'entrenador'
                ]);
                DB::table('equipos')->insert([
                    'user_id' => 3,
                    'nombre' => 'Heinsenberg Team',
                    'competicion' => 'SM1',
                    'ubicacion' => 'ES'
                ]);
            }
        }
    }
}
