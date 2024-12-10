<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroRequest extends FormRequest
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
            'codigo' => 'required|unique:libros',
            'nombre' => 'required|string|max:255',
            'imagen' => 'nullable|image',
            'precio' => 'required|numeric',
            'medida' => 'required|string|max:255',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'impuesto_id' => 'required|exists:impuestos,id',
        ];
    }
}
