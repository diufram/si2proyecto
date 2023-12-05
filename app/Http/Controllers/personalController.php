<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class personalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'nombre',
            'fechaNacimiento',
            'sexo',
            'telefono',
            'email',
            'direccion',
            'nit',
            'tipo',
            'edad',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        $personal = User::where('tipo', 'personal')->get();

        return view('personal.index', compact('personal', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal.create');
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

        $personal = User::create([
            'nombre' => $request->nombre,
            'fechaNacimiento' => $request->fechaNacimiento,
            'sexo' => $request->sexo,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'direccion' => $request->direccion,
            'nit' => $request->nit,
            'tipo' => 'personal',
            'edad'  => $request->edad,
        ]);

        return redirect()->route('personal.index', $personal);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personal = User::find($id);
        return view('personal.show', compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $personal = User::find($id);
        return view('personal.edit', ['personal' => $personal]);
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
            'direccion' => 'required',
            'nit' => 'required',
            'tipo' => 'required',
            'edad' => 'required',
        ]);
        //buscamos al personal a actualizar
        $personal = User::findOrFail($id);
        //actualizamos el personal
        $personal->update($request->all());

        //redireccionamos a la vista index
        return redirect()->route('personal.index')->with('sucess', 'Personal actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personal = User::findOrFail($id);
        $personal->delete();
        return redirect()->route('personal.index')->with('success', 'Personal eliminado con éxito');
    }
}
