<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\For_;

class statsJugadoresPepe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i < 13; $i++) {



            DB::table('jugador_estadisticas')->insert([

                'jornada_id' => 1,
                'jugador_id' => $i,
                'ataque' => random_int(3, 8),
                'defensa' => random_int(3, 8),
                'recepcion' => random_int(3, 8),
                'bloqueo' => random_int(3, 8),
                'colocacion' => random_int(3, 8),
                'saque' => random_int(3, 8)

            ]);
        }
    }
}
