<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nombre' => 'Ficción',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Terror',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Ciencia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Historia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Fantasía',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Misterio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Romance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Aventura',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Biografía',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Infantil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
