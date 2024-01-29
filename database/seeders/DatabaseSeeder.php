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
            etiquetasSeeder::class,
            EntrenamientosSeeder::class,
            etiquetasEntrenamientoSeeder::class,
            EquiposSeeder::class,
        ]);

         \App\Models\User::factory(10)->create();
    }
}
