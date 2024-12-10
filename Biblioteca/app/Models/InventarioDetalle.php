<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioDetalle extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventario_id',
        'libro_id',
        'cantidad',
    ];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
