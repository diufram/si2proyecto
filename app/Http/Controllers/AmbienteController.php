<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambiente;


class AmbienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ambientes = Ambiente::all();
        $heads = [
            'Nro',
            'Nombre',
            'Cantidad de Mesas',
            'Descripción',
            'Acciones'
        ];
        return view('ambiente.index', compact('heads','ambientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ambiente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'cantidad' => 'required',
            'descripcion' => 'required'
        ]);

        $ambiente = Ambiente::create([
            'nombre' => $request->nombre,
            'cantidaMesa' => $request->cantidad,
            'descripcion' => $request->descripcion
        ]);
        $this->saveToLog($request,'store',$ambiente);
        return redirect()->route('ambiente.index')->with('success', 'Ambiente creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ambiente = Ambiente::findOrFail($id);
        return view('ambiente.show', compact('ambiente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id_ambiente = Ambiente::findOrFail($id);
        return view('ambiente.edit', compact('id_ambiente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //en el $id viene el id del ambiente a actualizar
        request()->validate([
            'nombre' => 'required',
            'cantidad' => 'required',
            'descripcion' => 'required'
        ]);
        //buscamos el ambiente a actualizar
        $ambiente = Ambiente::findOrFail($id);
        //actualizamos el ambiente
        $ambiente->update($request->all());
        //redireccionamos a la vista index
        $this->saveToLog($request,'update',$ambiente);
        return redirect()->route('ambiente.index')->with('sucess', 'Ambiente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $ambiente = Ambiente::find($id);
        $this->saveToLog($request,'destroy',$ambiente);
        $ambiente->delete();
        return redirect()->route('ambiente.index')->with('sucess', 'Ambiente eliminado correctamente');
    }
}
