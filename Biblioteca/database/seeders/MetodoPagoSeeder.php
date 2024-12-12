<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metodo_pagos')->insert([
            [
                'nombre' => 'Tarjeta de Crédito Visa',
                'identificador' => 'pm_card_visa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Tarjeta de Débito Visa',
                'identificador' => 'pm_card_visa_debit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Transferencia Bancaria',
                'identificador' => 'bank_transfer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pago en Línea',
                'identificador' => 'online_payment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
