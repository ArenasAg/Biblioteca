<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'metodo_pagos';

    protected $fillable = [
        'nombre',
        'identificador',
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
