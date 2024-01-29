<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PosicionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posiciones = [
            ['cod_posicion' => 'COL', 'nombre' => 'Colocador'],
            ['cod_posicion' => 'OP', 'nombre' => 'Opuesto'],
            ['cod_posicion' => 'CEN', 'nombre' => 'Central'],
            ['cod_posicion' => 'LIB', 'nombre' => 'Libero'],
            ['cod_posicion' => 'REC', 'nombre' => 'Receptor'],
        ]; 

        foreach ($posiciones as $posicion) {
            DB::table('posicions')->insert([
                'cod_posicion' => $posicion['cod_posicion'],
                'nombre' => $posicion['nombre']
            ]);
        }
    }
}
