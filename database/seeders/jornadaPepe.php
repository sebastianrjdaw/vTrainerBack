<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class jornadaPepe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jornadas')->insert([
        
            'equipo_id' => 1,
            'numero' => 1,
            'fecha' => '2023-03-04 00:00:00',
            'rival'=>'Ferrol CV',
            'resultadoE'=>3,
            'resultadoR'=>0
              
    ]);
    }
}
