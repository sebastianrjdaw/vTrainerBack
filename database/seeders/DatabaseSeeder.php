<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            adminSeeder::class,
            usuarioSeeder::class,
            pepeSeeder::class,
            etiquetasSeeder::class,
            EntrenamientosSeeder::class,
            etiquetasEntrenamientoSeeder::class,
            perfilPepe::class,
            EquiposSeeder::class,
            DiaTipo::class,
            //equipoPepe::class,
            //jugadoresPepe::class,
            //jornadaPepe::class,
            //statsJugadoresPepe::class,
        ]);

         \App\Models\User::factory(10)->create();
    }
}
