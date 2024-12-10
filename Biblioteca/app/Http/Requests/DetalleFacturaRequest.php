<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleFacturaRequest extends FormRequest
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
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric',
            'valor_total' => 'required|numeric',
            'descuento' => 'required|numeric|min:0',
            'libro_id' => 'required|exists:libros,id',
            'factura_id' => 'required|exists:facturas,id',
        ];
    }
}
