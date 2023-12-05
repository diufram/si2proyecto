<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promocion extends Model
{
    use HasFactory;
    protected $table = 'promociones';

    protected $fillable = [
        'nombre',
        'descripcion',
        'procentajeDescuento',
    ];
}
