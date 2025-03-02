<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('categorias')->insert([
        ['nombre' => 'Chuches'],
        ['nombre' => 'Bebidas'],
        ['nombre' => 'Frutos secos'],
        ['nombre' => 'Cromos'],
        ['nombre' => 'Trompos'],
    ]);
}
}