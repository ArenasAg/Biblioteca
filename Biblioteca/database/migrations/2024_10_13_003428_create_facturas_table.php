<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable(false);
            $table->decimal('subtotal', 10, 2)->nullable(false);
            $table->decimal('total_impuestos', 10, 2)->nullable(false);
            $table->decimal('total', 10, 2)->nullable(false);
            $table->boolean('estado')->nullable(false);
            $table->string('stripe_invoice_id')->nullable(true);
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('metodo_pago_id')->constrained();
            $table->timestamps();

            $table->foreign('cliente_id', 'fk_facturas_cliente_id')
                ->references('id')->on('clientes')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('metodo_pago_id', 'fk_facturas_metodo_pago_id')
                ->references('id')->on('metodo_pagos')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
