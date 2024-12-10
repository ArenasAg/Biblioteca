<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
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
            'productos' => 'required|array',
            'productos.*.libro_id' => 'required|exists:libros,id',
            'productos.*.cantidad' => 'required|integer|min:1',
            'metodo_pago_id' => 'required|exists:metodo_pagos,id',
        ];
    }
}
