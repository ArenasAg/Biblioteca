<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CompraCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($libro) {
                return [
                    'id' => $libro->id,
                    'nombre' => $libro->nombre,
                    'descripcion' => 'El libro '.$libro->nombre.' tiene una medida de '.$libro->medida.' y se encuentra en la categoría '.$libro->categoria->nombre,
                    'precio' => $libro->precio,
                ];
            }),
            'links' => [
                'self' => url('/api/compras'),
            ],
        ];
    }
}
