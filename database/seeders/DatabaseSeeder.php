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
            perfilPepe::class,
            equipoPepe::class,
            jugadoresPepe::class,
            jornadaPepe::class,
            statsJugadoresPepe::class,
            EntrenamientosSeeder::class,
            etiquetasEntrenamientoSeeder::class,
        ]);

         \App\Models\User::factory(10)->create();
    }
}
