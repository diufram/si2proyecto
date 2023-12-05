@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">PRODUCTO</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $producto->nombre }}</p>
            <p><strong>Precio:</strong> {{ $producto->precio }}</p>
            <p><strong>Stock:</strong>{{ $producto->stock }}</p>
            <p><strong>Descripcion:</strong>{{ $producto->descripcion }}</p>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('producto.edit', $producto) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('producto.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop