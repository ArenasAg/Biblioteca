<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'impuestos';

    protected $fillable = [
        'nombre',
        'porcentaje',
    ];

    public function libros()
    {
        return $this->hasMany(Libro::class);
    }
}
