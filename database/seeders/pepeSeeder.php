<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class pepeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        
            'name' => 'pepe',
            'email' => 'pepe@pepe.com',
            'rol' => 'usuario',
            'password' => Hash::make('pepe')    
    ]);
    }
}
