<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\producto;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menus';



    public function productos()
    {
        return $this->belongsToMany(producto::class, 'menu_platos');
    }
}
