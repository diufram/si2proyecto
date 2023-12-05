<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = categoria::all();
        $heads = [
            'Nombre',
            'Descripcion',
            'Estado',
            'Portada',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        return view('categorias.index', compact('heads','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'status' => 'required'
        ]);
 


        $categoria = new categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->status = $request->status;

        if( $request->hasFile('url')){
            
            $file = $request->file('url');
            $destinationPath = 'images/category/';
            $filename = time(). '-' .$file->getClientOriginalName();
            $uploadSuccess = $request->file('url')->move($destinationPath, $filename);
            $categoria->url = $destinationPath . $filename;
        }

    
        $categoria->save();
        $this->saveToLog($request,'store',$categoria);
        return redirect()->route('categoria.index');
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
            'descripcion' => 'required',
            'status' => 'required'
        ]);


        $categoria = Categoria::find($id);


        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->status = $request->status;
        if( $request->hasFile('url')){
            if (file_exists(public_path($categoria->url))) {
                unlink(public_path($categoria->url));
            }
            $file = $request->file('url');
            $destinationPath = 'images/category/';
            $filename = time(). '-' .$file->getClientOriginalName();
            $uploadSuccess = $request->file('url')->move($destinationPath, $filename);
            $categoria->url = $destinationPath . $filename;
        }

        $categoria->update();
        $this->saveToLog($request, 'update', $categoria);
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {

        
        
        $categoria = Categoria::find($id);
        if (file_exists(public_path($categoria->url))) {
            unlink(public_path($categoria->url));
        }

        $categoria = categoria::find($id);
        $this->saveToLog($request, 'delete', $categoria);
        $categoria->delete();
        return redirect()->route('categoria.index')->with('sucess', 'Ambiente eliminado correctamente');
    }
}
