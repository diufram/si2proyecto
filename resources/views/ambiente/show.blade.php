@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">AMBIENTE</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $ambiente->nombre }}</p>
            <p><strong>Cantidad de Mesas:</strong> {{ $ambiente->cantidaMesa }}</p>
            <p><strong>Descripcion:</strong>{{ $ambiente->descripcion }}</p>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('ambiente.edit', $ambiente) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('ambiente.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop
