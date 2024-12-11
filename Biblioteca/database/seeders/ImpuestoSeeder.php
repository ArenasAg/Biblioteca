<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('impuestos')->insert([
            [
                'nombre' => 'IVA',
                'porcentaje' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'IGIC',
                'porcentaje' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'ISR',
                'porcentaje' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'IVA Reducido',
                'porcentaje' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'IVA Superreducido',
                'porcentaje' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
