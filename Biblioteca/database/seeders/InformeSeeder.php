<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('informes')->insert([
            [
                'fecha' => '2024-01-01',
                'tipo_informe' => 'A',
                'datos_json' => json_encode([
                    'total_ventas' => 100000,
                    'total_compras' => 50000,
                    'total_ganancias' => 50000,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2024-02-01',
                'tipo_informe' => 'B',
                'datos_json' => json_encode([
                    'total_ventas' => 150000,
                    'total_compras' => 70000,
                    'total_ganancias' => 80000,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha' => '2024-03-01',
                'tipo_informe' => 'C',
                'datos_json' => json_encode([
                    'total_ventas' => 200000,
                    'total_compras' => 100000,
                    'total_ganancias' => 100000,
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
