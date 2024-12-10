<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleFactura extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'detalle_facturas';

    protected $fillable = [
        'cantidad',
        'precio_unitario',
        'valor_total',
        'descuento',
        'libro_id',
        'factura_id',
    ];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
