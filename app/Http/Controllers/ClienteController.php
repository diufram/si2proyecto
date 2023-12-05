<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $heads = [
            'nombre',
            'fechaNacimiento',
            'sexo' ,
            'telefono' ,
            'email' ,
            'direccion' ,
            'nit',
            'tipo', 
            'edad',
            ['label' => 'Acciones', 'no-export' => true],
    ];
        $clientes = User::where('tipo', 'cliente')->get();
        //return dd($clientes);
        return view('clientes.index', compact('clientes', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'nombre' => 'required',
            'fechaNacimiento' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'password' => 'required',
            'direccion' => 'required',
            'nit' => 'required',
            'tipo' => 'required',
            'edad' => 'required',
        ]);
        
        $cliente = User::create([
            'nombre' => $request->nombre,
            'fechaNacimiento' => $request->fechaNacimiento,
            'sexo' => $request->sexo,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'direccion' => $request->direccion,
            'nit' => $request->nit,
            'tipo' => 'cliente',
            'edad'  => $request->edad,
        ]);
        
        return redirect()->route('clientes.index', $cliente);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = User::find($id);
       // return dd($cliente);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = User::find($id);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'nombre' => 'required',
            'fechaNacimiento' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'password' => 'required',
            'direccion' => 'required',
            'nit' => 'required',
            'tipo' => 'required',
            'edad' => 'required',
        ]);
        //buscamos el ambiente a actualizar
        $cliente = User::findOrFail($id);
        //actualizamos el ambiente
        $cliente->update($request->all());
        //redireccionamos a la vista index

        return redirect()->route('clientes.index')->with('sucess', 'Cliente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = User::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado con éxito');
    }
}