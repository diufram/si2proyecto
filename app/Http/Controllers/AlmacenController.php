<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Nombre',
            'Ubicación', 
            'Acciones'
        ];

        $almacenes = Almacen::all();

        return view('almacen.index',compact('heads', 'almacenes'));
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
        request()->validate([
            'nombre' => 'required',
            'ubicacion' => 'required'
        ]);

        Almacen::create([
            'nombreAlmacen' => $request->nombre,
            'ubicacion' => $request->ubicacion,
        ]);

        return redirect()->route('almacen.index')->with('success','Almacen creado correctamente');
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
        request()->validate([
            'nombre' => 'required',
            'ubicacion' => 'required'
        ]);
        $almacen = Almacen::find($id);
        $almacen->nombreAlmacen = $request->nombre;
        $almacen->ubicacion = $request->ubicacion;
        $almacen->update();

        return redirect()->route('almacen.index')->with('success','Almacen actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $almacen = Almacen::find($id);
        $this->saveToLog($request,'destroy',$almacen);
        $almacen->delete();
        return redirect()->route('almacen.index')->with('sucess', 'Almacen eliminado correctamente');
    }
}
