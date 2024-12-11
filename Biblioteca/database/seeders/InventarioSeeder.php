<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar movimientos de inventario
        DB::table('inventarios')->insert([
            [
                'fecha' => '2024-01-01',
                'tipo_movimiento' => 'entrada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2024-01-02',
                'tipo_movimiento' => 'salida',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2024-01-03',
                'tipo_movimiento' => 'entrada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Obtener los IDs de los movimientos de inventario
        $inventarios = DB::table('inventarios')->pluck('id');

        // Insertar detalles de inventario
        DB::table('inventario_detalles')->insert([
            // Detalles para el primer movimiento de inventario
            [
                'inventario_id' => $inventarios[0],
                'libro_id' => 1, // El Gran Gatsby
                'cantidad' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inventario_id' => $inventarios[0],
                'libro_id' => 2, // Cien Años de Soledad
                'cantidad' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inventario_id' => $inventarios[0],
                'libro_id' => 3, // Breve Historia del Tiempo
                'cantidad' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Detalles para el segundo movimiento de inventario
            [
                'inventario_id' => $inventarios[1],
                'libro_id' => 4, // Drácula
                'cantidad' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inventario_id' => $inventarios[1],
                'libro_id' => 5, // El Señor de los Anillos
                'cantidad' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inventario_id' => $inventarios[1],
                'libro_id' => 6, // Sherlock Holmes
                'cantidad' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Detalles para el tercer movimiento de inventario
            [
                'inventario_id' => $inventarios[2],
                'libro_id' => 7, // Orgullo y Prejuicio
                'cantidad' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inventario_id' => $inventarios[2],
                'libro_id' => 8, // Las Aventuras de Tom Sawyer
                'cantidad' => 45,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'inventario_id' => $inventarios[2],
                'libro_id' => 9, // La Vida de Pi
                'cantidad' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
