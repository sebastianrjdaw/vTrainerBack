<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class etiquetasEntrenamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asignar dos etiquetas a cada uno de los dos primeros entrenamientos
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                DB::table('entrenamiento_etiqueta')->insert([
                    'entrenamiento_id' => $i,
                    'etiqueta_id' => ($i - 1) * 2 + $j,
                ]);
            }
        }
    }
}
