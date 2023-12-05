<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $table = 'productos';

    protected $fillable = [
        'categoria_id',
        'nombre',
        'precio',
        'imagen',
        'stock',
        'descripcion',
        'disponibilida'
    ];

    public function menu()
    {
        return $this->belongsToMany(Menu::class, 'menu_platos');
    }

    public function categoria()
    {
        return $this->belongsTo(categoria::class);
    }
}

