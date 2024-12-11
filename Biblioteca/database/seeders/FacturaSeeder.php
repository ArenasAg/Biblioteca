<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar facturas
        DB::table('facturas')->insert([
            [
                'codigo' => 'FAC001',
                'subtotal' => 0, // Se actualizará después de insertar los detalles
                'total_impuestos' => 19000.00,
                'total' => 0, // Se actualizará después de insertar los detalles
                'estado' => true,
                'cliente_id' => 1, // Asegúrate de que este cliente exista
                'metodo_pago_id' => 1, // Asegúrate de que este método de pago exista
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'FAC002',
                'subtotal' => 0, // Se actualizará después de insertar los detalles
                'total_impuestos' => 28500.00,
                'total' => 0, // Se actualizará después de insertar los detalles
                'estado' => true,
                'cliente_id' => 2, // Asegúrate de que este cliente exista
                'metodo_pago_id' => 2, // Asegúrate de que este método de pago exista
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'codigo' => 'FAC003',
                'subtotal' => 0, // Se actualizará después de insertar los detalles
                'total_impuestos' => 38000.00,
                'total' => 0, // Se actualizará después de insertar los detalles
                'estado' => true,
                'cliente_id' => 3, // Asegúrate de que este cliente exista
                'metodo_pago_id' => 3, // Asegúrate de que este método de pago exista
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Obtener los IDs de las facturas
        $facturas = DB::table('facturas')->pluck('id');

        // Obtener los precios de los libros
        $libros = DB::table('libros')->pluck('precio', 'id');

        // Insertar detalles de facturas
        $detalles = [
            // Detalles para la primera factura
            [
                'factura_id' => $facturas[0],
                'libro_id' => 1, // El Gran Gatsby
                'cantidad' => 2,
                'precio_unitario' => $libros[1],
                'valor_total' => 2 * $libros[1],
                'descuento' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'factura_id' => $facturas[0],
                'libro_id' => 2, // Cien Años de Soledad
                'cantidad' => 1,
                'precio_unitario' => $libros[2],
                'valor_total' => 1 * $libros[2],
                'descuento' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Detalles para la segunda factura
            [
                'factura_id' => $facturas[1],
                'libro_id' => 3, // Breve Historia del Tiempo
                'cantidad' => 3,
                'precio_unitario' => $libros[3],
                'valor_total' => 3 * $libros[3],
                'descuento' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'factura_id' => $facturas[1],
                'libro_id' => 4, // Drácula
                'cantidad' => 1,
                'precio_unitario' => $libros[4],
                'valor_total' => 1 * $libros[4],
                'descuento' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Detalles para la tercera factura
            [
                'factura_id' => $facturas[2],
                'libro_id' => 5, // El Señor de los Anillos
                'cantidad' => 2,
                'precio_unitario' => $libros[5],
                'valor_total' => 2 * $libros[5],
                'descuento' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'factura_id' => $facturas[2],
                'libro_id' => 6, // Sherlock Holmes
                'cantidad' => 1,
                'precio_unitario' => $libros[6],
                'valor_total' => 1 * $libros[6],
                'descuento' => 0.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('detalle_facturas')->insert($detalles);

        // Actualizar los subtotales y totales de las facturas
        foreach ($facturas as $factura_id) {
            $subtotal = DB::table('detalle_facturas')
                ->where('factura_id', $factura_id)
                ->sum('valor_total');

            $total_impuestos = DB::table('facturas')
                ->where('id', $factura_id)
                ->value('total_impuestos');

            $total = $subtotal + $total_impuestos;

            DB::table('facturas')
                ->where('id', $factura_id)
                ->update([
                    'subtotal' => $subtotal,
                    'total' => $total,
                ]);
        }
    }
}
