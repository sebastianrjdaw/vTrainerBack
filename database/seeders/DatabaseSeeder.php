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
            AdminSeeder::class,
            UsuarioSeeder::class,
            EtiquetasSeeder::class,
            EntrenamientosSeeder::class,
            EtiquetasEntrenamientoSeeder::class,
            EquiposSeeder::class,
            PosicionesSeeder::class
        ]);

         \App\Models\User::factory(10)->create();
    }
}
