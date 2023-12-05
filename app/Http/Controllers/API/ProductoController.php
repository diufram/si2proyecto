<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function productos(){
        $productos = Producto::all();
        return response()->json($productos,200);
    }
}
