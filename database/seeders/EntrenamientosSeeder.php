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
        $titulos=['Defensa','Colocacion','Recepcion','Bloqueo','Ataque'];

        foreach ($titulos as $titulo) {
            DB::table('entrenamientos')->insert([
        
                'Titulo' => 'E.'.$titulo,
                'Cuerpo' =>'Esto es un entrenamiento sobre'.$titulo
            ]);
        }
        
    }
}
