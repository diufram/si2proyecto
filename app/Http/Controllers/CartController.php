<?php

namespace App\Http\Controllers;

use App\Models\Detalle_ordenes;
use App\Models\Ordenes;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $Products = Producto::find($request->id);
        if (empty($Products))
            return redirect('/menus');
        Cart::add(
            $Products->id,
            $Products->nombre,
            1,
            $Products->precio,
            ['imagen' => $Products->imagen],

        );
        //dd(Cart::content());
        //return view('menus.index');
    }

    public function checkout()
    {
        return view('carrito.checkout');
    }

    public function removeItem(Request $request)
    {
        Cart::remove($request->rowId);
        return view('carrito.checkout');
    }

    public function clear()
    {
        Cart::destroy();
        return view('carrito.checkout');
    }

    public function index()
    {
        $datos = Cart::content();
        $id = auth()->user()->id;
        return view('carrito.pay', ['id' => $id]);
    }

    public function pagar(Request $request) {
        $orden = new Ordenes();
        $orden->empleado_id = 1;
        $orden->direccion_id = 1;
        $orden->tipoPago_id = 1;
        $orden->promocion_id = 1;
        $orden->tipoOden_id = 1;
        $orden->cliente_id = 1;
        $orden->fecha = Carbon::now();
        $orden->subtotal = intval(Cart::subtotal());
        $orden->descuento = 0;
        $orden->total = intval(Cart::total());
        $orden->save();

        foreach (Cart::content() as $item){
            $detalleOrden = new Detalle_ordenes();
            $detalleOrden->orden_id = $orden->id;
            $detalleOrden->producto_id = $item->id;
            $detalleOrden->precio = number_format($item->price,2);
            $detalleOrden->cantidad = $item->qty;
            $detalleOrden->subtotal = number_format($item->qty * $item->price,2);
            $detalleOrden->save();
        }
       
        Cart::destroy();
        return redirect()->route('main');
    }
}
