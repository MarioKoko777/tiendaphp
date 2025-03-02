<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Ejecutar los seeders en el orden correcto
        $this->call([
            UsuariosTableSeeder::class,
            CategoriasTableSeeder::class,
            ProductosTableSeeder::class,
        ]);
    }
}
