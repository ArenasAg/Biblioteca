<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener los impuestos para calcular el precio final
        $impuestos = DB::table('impuestos')->pluck('porcentaje', 'id');

        DB::table('libros')->insert([
            [
                'codigo' => 'LIB001',
                'nombre' => 'El Gran Gatsby',
                'imagen' => 'img/el_gran_gatsby.jpg',
                'precio' => 59900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 20.5, // Medida del libro en cm
                'stock' => 50,
                'categoria_id' => 1, // Ficción
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'LIB002',
                'nombre' => 'Cien Años de Soledad',
                'imagen' => 'img/cien_anos_de_soledad.jpg',
                'precio' => 74900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 21.0, // Medida del libro en cm
                'stock' => 30,
                'categoria_id' => 1, // Ficción
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'LIB003',
                'nombre' => 'Breve Historia del Tiempo',
                'imagen' => 'img/breve_historia_del_tiempo.jpg',
                'precio' => 89900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 22.0, // Medida del libro en cm
                'stock' => 20,
                'categoria_id' => 3, // Ciencia
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'LIB004',
                'nombre' => 'Drácula',
                'imagen' => 'img/dracula.jpg',
                'precio' => 49900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 19.5, // Medida del libro en cm
                'stock' => 40,
                'categoria_id' => 2, // Terror
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'LIB005',
                'nombre' => 'El Señor de los Anillos',
                'imagen' => 'img/el_senor_de_los_anillos.jpg',
                'precio' => 129900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 23.0, // Medida del libro en cm
                'stock' => 15,
                'categoria_id' => 5, // Fantasía
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'LIB006',
                'nombre' => 'Sherlock Holmes',
                'imagen' => 'img/sherlock_holmes.jpg',
                'precio' => 59900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 20.0, // Medida del libro en cm
                'stock' => 25,
                'categoria_id' => 6, // Misterio
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'LIB007',
                'nombre' => 'Orgullo y Prejuicio',
                'imagen' => 'img/orgullo_y_prejuicio.jpg',
                'precio' => 39900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 19.0, // Medida del libro en cm
                'stock' => 35,
                'categoria_id' => 7, // Romance
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'LIB008',
                'nombre' => 'Las Aventuras de Tom Sawyer',
                'imagen' => 'img/tom_sawyer.jpg',
                'precio' => 29900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 18.5, // Medida del libro en cm
                'stock' => 45,
                'categoria_id' => 8, // Aventura
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'LIB009',
                'nombre' => 'La Vida de Pi',
                'imagen' => 'img/la_vida_de_pi.jpg',
                'precio' => 49900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 21.5, // Medida del libro en cm
                'stock' => 20,
                'categoria_id' => 9, // Biografía
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'LIB010',
                'nombre' => 'El Principito',
                'imagen' => 'img/el_principito.jpg',
                'precio' => 19900 * (1 + $impuestos[1] / 100), // IVA 19%
                'medida' => 18.0, // Medida del libro en cm
                'stock' => 50,
                'categoria_id' => 10, // Infantil
                'impuesto_id' => 1, // IVA
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
