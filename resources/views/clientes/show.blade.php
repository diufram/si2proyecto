@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">CLIENTES</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $cliente->nombre }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $cliente->fechaNacimiento }}</p>
            <p><strong>Sexo:</strong>{{ $cliente->sexo }}</p>
            <p><strong>Telefono:</strong>{{ $cliente->telefono }}</p>
            <p><strong>Email:</strong>{{ $cliente->email }}</p>
            <p><strong>Nit:</strong>{{ $cliente->nit }}</p>
            <p><strong>Tipo:</strong>{{ $cliente->tipo }}</p>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop