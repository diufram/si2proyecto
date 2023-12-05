<?php

namespace App\Http\Controllers;

use App\Models\Insumo;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proveedor;
use App\Models\Almacen;
use Illuminate\Support\Facades\Auth;


class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insumos = Insumo::all();
        $proveedores = Proveedor::all();
        $almacenes = Almacen::all();   
        $heads = [
            'Nombre',
            'Estado',
            'Stock',
            'Fecha compra',
            'Fecha vencimiento',
            'Registrador',
            'Almacen',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        return view('insumos.index', compact('heads','insumos','proveedores','almacenes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nombre' => 'required',
            'status' => 'required',
            'stock' => 'required',
            'unidad' => 'required',
            'minimoStock' => 'required',
            'almacen_id' => 'required',
            'proveedor_id' => 'required',
            'fechaCompra' => 'required',
            'fechaVencimiento' => 'required'
        ]);
    
        
        $empleado =  Auth::user();
         
        //este metodo no funciona para asignacion con llaves foraneas razon ni idea 
        // $insumo = Insumo::create([
        //     'empleado_id' => $empleado->id,
        //     'almacen_id' => $request->almacen_id,
        //     'proveedor_id' => $request->proveedor_id,
        //     'nombre' => $request->nombre,
        //     'status' => $request->status,
        //     'stock' => $request->stock,
        //     'unidad' => $request->unidad,
        //     'fechaCompra' => $request->fechaCompra,
        //     'fechaVencimiento' => $request->fechaVencimiento,
        //     'minimoStock' => $request->minimoStock,
        //     'Registrador' => $empleado->nombre
        // ]);

        $insumo = new Insumo();
        $insumo->empleado_id = $empleado->id;
        $insumo->almacen_id = $request->almacen_id;
        $insumo->proveedor_id = $request->proveedor_id;
        $insumo->nombre = $request->nombre;
        $insumo->status = $request->status;
        $insumo->stock = $request->stock;
        $insumo->unidad = $request->unidad;
        $insumo->fechaCompra = $request->fechaCompra;
        $insumo->fechaVencimiento = $request->fechaVencimiento;
        $insumo->minimoStock = $request->minimoStock;
        $insumo->Registrador = $empleado->nombre;
        $insumo->save();


        $this->saveToLog($request,'store',$insumo);
        return redirect()->route('insumo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'status' => 'required',
            'stock' => 'required',
            'unidad' => 'required',
            'minimoStock' => 'required',
            'almacen_id' => 'required',
            'proveedor_id' => 'required',
            'fechaCompra' => 'required',
            'fechaVencimiento' => 'required'
        ]);


        $insumo = Insumo::find($id);
        $empleado =  Auth::user();

 
        $insumo->empleado_id = $empleado->id;
        $insumo->almacen_id = $request->almacen_id;
        $insumo->proveedor_id = $request->proveedor_id;
        $insumo->nombre = $request->nombre;
        $insumo->status = $request->status;
        $insumo->stock = $request->stock;
        $insumo->unidad = $request->unidad;
        $insumo->fechaCompra = $request->fechaCompra;
        $insumo->fechaVencimiento = $request->fechaVencimiento;
        $insumo->minimoStock = $request->minimoStock;
        $insumo->Registrador = $empleado->nombre;
        $insumo->update();
 
        $this->saveToLog($request, 'update', $insumo);
        return redirect()->route('insumo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $Insumo = Insumo::find($id);
 
        $Insumo = Insumo::find($id);
        $this->saveToLog($request, 'delete', $Insumo);
        $Insumo->delete();
        return redirect()->route('insumo.index')->with('sucess', 'Insumo eliminado correctamente');
    }
}
