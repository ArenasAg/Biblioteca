<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
            CategoriaSeeder::class,
            ImpuestoSeeder::class,
            LibroSeeder::class,
            InventarioSeeder::class,
            InformeSeeder::class,
            MetodoPagoSeeder::class,
            FacturaSeeder::class,
        ]);
    }
}
