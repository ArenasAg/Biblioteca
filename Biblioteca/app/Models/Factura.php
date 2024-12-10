<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'facturas';

    protected $fillable = [
        'codigo',
        'fecha',
        'subtotal',
        'total_impuestos',
        'total',
        'estado',
        'stripe_invoice_id',
        'cliente_id',
        'metodo_pago_id',
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleFactura::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class);
    }
}
