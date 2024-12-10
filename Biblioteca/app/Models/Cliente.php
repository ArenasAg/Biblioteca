<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'clientes';

    protected $fillable = [
        'numero_documento',
        'direccion',
        'telefono',
        'email',
        'ciudad',
    ];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
