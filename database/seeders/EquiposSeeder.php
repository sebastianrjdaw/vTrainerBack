<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipos = [
            'SM1' => ['EquipoA', 'EquipoB'],
            'SM2' => ['EquipoC', 'EquipoD'],
            'SF1' => ['EquipoE', 'EquipoF'],
            'SF2' => ['EquipoG', 'EquipoH'],
        ];

        foreach ($equipos as $competicion => $nombresDeEquipos) {
            foreach ($nombresDeEquipos as $nombre) {
                DB::table('equipos')->insert([
                    'competicion' => $competicion,
                    'nombre' => $nombre,
                    'ubicacion' => 'ES',
                    'user_id' => null // No asignar un user_id
                ]);
            }
        }
    }
}

