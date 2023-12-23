<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jugadoresPepe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 13; $i++) {

            $altura = rand(160, 200);
            $nombres = ["Juan", "Carlos", "Pedro", "José", "Fernando", "Luis", "Antonio", "Miguel", "Pablo", "Javier"];
            $apellidos = ["González", "López", "Martínez", "García", "Rodríguez", "Hernández", "Pérez", "Sánchez", "Fernández", "Romero"];
            $posicion = ['colocador', 'opuesto', 'libero', 'central', 'receptor'];
            $posicionRand = $posicion[array_rand($posicion)];
            $nombreRand = $nombres[array_rand($nombres)];
            $apellidoRand = $apellidos[array_rand($apellidos)];


            DB::table('jugadors')->insert([

                'nombre' => $nombreRand,
                'apellidos' => $apellidoRand,
                'dorsal'=>$i,
                'altura' => $altura,
                'posicion' => $posicionRand,
                'equipo_id' => 1

            ]);
        }
    }
}
