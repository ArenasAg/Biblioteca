<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'codigo' => 'required|string|max:50|unique:facturas',
            'fecha' => 'required|date|before_or_equal:today',
            'subtotal' => 'required|numeric',
            'total_impuestos' => 'required|numeric',
            'total' => 'required|numeric',
            'estado' => 'required|boolean',
            'cliente_id' => 'required|exists:clientes,id',
            'metodo_pago_id' => 'required|exists:metodo_pagos,id',
            'libro_id' => 'required|array',
            'libro_id.*' => 'exists:libros,id',
            'cantidad' => 'required|array',
            'cantidad.*' => 'integer|min:1',
            'descuento' => 'required|array',
            'descuento.*' => 'numeric|min:0',
        ];
    }
}
