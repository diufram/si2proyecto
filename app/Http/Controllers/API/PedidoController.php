<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\detalle_orden;
use App\Models\Detalle_ordenes;
use App\Models\orden;
use App\Models\Ordenes;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class PedidoController extends Controller
{
    public function pedido(Request $request)
    {
        $orden = new Ordenes();
        $orden->empleado_id = 1;
        $orden->direccion_id = 1;
        $orden->tipoPago_id = 1;
        $orden->promocion_id = 1;
        $orden->tipoOden_id = 1;
        $orden->cliente_id = $request->user()->id;
        $orden->fecha = Carbon::now();
        $orden->subtotal = $request["total"];
        $orden->descuento = 0;
        $orden->total = $request["total"];
        $orden->save();

        $product = $request["productos"];
        $i = 0;
        while ($i < sizeof($product)) {
            $p = $product[$i];
            $d = new Detalle_ordenes();
            $d->orden_id = $orden->id;
            $d->producto_id = $p["id"];
            $d->precio =  $p["precio"];
            $d->cantidad = $p["cantidad"];
            $d->subtotal =  $p["precio"] * $p["cantidad"] ;
            $d->save();
            $i++;
        }
            
    }

    public function compras(Request $request){
        $compras = DB::select('SELECT * FROM ordenes WHERE cliente_id = ?', [$request->user()->id]);
        return response()->json($compras,200);
    }
}
