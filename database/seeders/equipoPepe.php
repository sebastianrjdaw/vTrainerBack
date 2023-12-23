<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class equipoPepe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipos')->insert([
        
            'user_id' => 3,
            'competicion' => '1º Nacional Masc',
            'nombre' => 'EquipoPepe',
            'ubicacion'=>'Ferrol'
              
    ]);
    }
}
