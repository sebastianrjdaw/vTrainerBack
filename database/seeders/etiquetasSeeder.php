<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class etiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $etiquetas =['Defensa','Colocacion','Recepcion','Bloqueo','Ataque'];
        foreach($etiquetas as $etiqueta){
            DB::table('etiquetas')->insert([
                'Titulo'=> $etiqueta,
            ]);
            }
               
    
    }
}
