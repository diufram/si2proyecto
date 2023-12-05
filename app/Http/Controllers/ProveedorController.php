<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proveedor;
use App\Models\telefono;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = proveedor::all();
        $heads = [
            'Nombre',
            'Teléfono',
            'Correo',
            'País',
            'Descripcion',
            'Acciones'
        ];
        return view('proveedor.index', compact('heads','proveedores'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'email' => 'required',
            'numero' => 'required',
            'pais' => 'required',
            'descripcion' => 'required'
        ]);

        proveedor::create([
            'nombre' => $request->nombre,
            'correo' => $request->email,
            'telefono' => $request->numero,
            'pais' => $request->pais,
            'descripcion' => $request->descripcion
        ]);
        return redirect()->route('proveedor.index')->with('success', 'Proveedor creado correctamente');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proveedor = proveedor::findOrFail($id);
        return view('proveedor.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proveedor = proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'pais' => 'required',
            'descripcion' => 'required'
        ]);
        $proveedor = proveedor::findOrFail($id);
        $proveedor->update($request->all());
        return redirect()->route('proveedor.index')->with('success', 'Proveedor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = proveedor::findOrFail($id);
        $proveedor->delete();
        return redirect()->route('proveedor.index', $proveedor); 
    }
}
