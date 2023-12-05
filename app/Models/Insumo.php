<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{

    use HasFactory;
    protected $table = 'insumos';
    const ACTIVO = 1;
    const INACTIVO = 0;

    const KILOS = 10;
    const LITROS = 11;
    const UNIDADES = 12;

    protected $fillable = [
        'nombre',
        'status',
        'stock',
        'unidad',
        'fechaCompra',
        'fechaVencimiento',
        'minimoStock',
        'Registrador',
    ];
}
