<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('usuarios')->insert([
        [
            'nombre' => 'Admin',
            'apellidos' => 'Admin',
            'email' => 'admin@kiosko.com',
            'password' => Hash::make('password'),
            'rol' => 'admin',
        ],
        [
            'nombre' => 'Usuario',
            'apellidos' => 'Normal',
            'email' => 'user@kiosko.com',
            'password' => Hash::make('password'),
            'rol' => 'user',
        ],
    ]);
}
}
