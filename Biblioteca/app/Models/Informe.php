<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'informes';

    protected $fillable = [
        'fecha',
        'tipo_informe',
        'datos_json',
    ];
}
