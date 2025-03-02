<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('productos')->insert([
        [
            'categoria_id' => 1,
            'nombre' => 'Gominolas',
            'descripcion' => 'Gominolas de varios sabores',
            'precio' => 1.50,
            'stock' => 100,
            'oferta' => 'No',
            'fecha' => now(),
            'imagen' => 'gominolas.jpg',
        ],
        [
            'categoria_id' => 2,
            'nombre' => 'Cocacola',
            'descripcion' => 'Lata de Cocacola de 33cl',
            'precio' => 1.50,
            'stock' => 100,
            'oferta' => 'No',
            'fecha' => now(),
            'imagen' => 'Cocacola.jpg',
        ],
        [
            'categoria_id' => 3,
            'nombre' => 'Pipas',
            'descripcion' => 'Pipas tijuana',
            'precio' => 1.00,
            'stock' => 100,
            'oferta' => 'No',
            'fecha' => now(),
            'imagen' => 'Pipas.jpg',
        ],
        [
            'categoria_id' => 4,
            'nombre' => 'Sobre Pokemon',
            'descripcion' => 'Sobre de 10 cartas',
            'precio' => 5.60,
            'stock' => 100,
            'oferta' => 'No',
            'fecha' => now(),
            'imagen' => 'SobrePokemon.jpg',
        ],
        [
            'categoria_id' => 5,
            'nombre' => 'Trompo Dragon',
            'descripcion' => 'Trompon Dragon',
            'precio' => 8,
            'stock' => 100,
            'oferta' => 'No',
            'fecha' => now(),
            'imagen' => 'TrompoDragon.jpg',
        ],
    ]);
}
}