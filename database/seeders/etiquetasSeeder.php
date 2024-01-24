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

        $etiquetas =['colocacion','ataque','defensa','bloqueo'];
        foreach($etiquetas as $etiqueta){
            DB::table('etiquetas')->insert([
                'titulo' => $etiqueta,
                'user_id' => null
            ]);
            }
    
    }
}
