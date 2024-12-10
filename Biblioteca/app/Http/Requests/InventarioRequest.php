<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
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
            'fecha' => 'required|date',
            'tipo_movimiento' => 'required|string|max:255',
            'libro_id' => 'required|array',
            'libro_id.*' => 'exists:libros,id',
            'cantidad' => 'required|array',
            'cantidad.*' => 'integer|min:1',
        ];
    }
}
