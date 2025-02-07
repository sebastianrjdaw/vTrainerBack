<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $user = User::create([
            'name' => 'entrenador_test',
            'email' => 'entrenador_test@admin.com',
            'password' => Hash::make('admin')
        ]);
        $user->assignRole('entrenador');

        $user = User::create([
            'name' => 'jugador_test',
            'email' => 'jugador_test@admin.com',
            'password' => Hash::make('admin')
        ]);
        $user->assignRole('jugador');
       
    }
}
