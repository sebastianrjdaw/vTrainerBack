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
        for($i = 1; $i <6 ;$i++){
            DB::table('entrenamiento_etiqueta')->insert([
            'entrenamiento_id' => $i,
            'etiqueta_id'=>$i
            ]);
        }
        
    }
}
