@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">PROVEEDOR</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $proveedor->nombre }}</p>
            <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $proveedor->correo }}</p>
            <p><strong>País: </strong>{{ $proveedor->pais }}</p>
            <p><strong>Descripcion: </strong>{{ $proveedor->descripcion }}</p>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('proveedor.edit', $proveedor) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('proveedor.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop
