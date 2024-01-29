<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $datos = ['jugador','entrenador'];
        foreach ($datos as $dato){
            DB::table('users')->insert([

                'name' => $dato,
                'email' => $dato.'@'.$dato.'.com',
                'rol' => 'usuario',
                'password' => Hash::make($dato)
            ]);
        }
    }
}
