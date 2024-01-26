<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntrenamientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonPath = base_path('/public/aux/entrenamientos.json');

        // Leer el contenido del archivo JSON
        $json = file_get_contents($jsonPath);

        // Convertir JSON a array PHP
        $entrenamientos = json_decode($json, true);

        foreach ($entrenamientos as $entrenamiento) {
            DB::table('entrenamientos')->insert([
                'titulo' => $entrenamiento['titulo'],
                'cuerpo' => $entrenamiento['cuerpo'],
                'user_id' => null,
            ]);
        }
    }
}
