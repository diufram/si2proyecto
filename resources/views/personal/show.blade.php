@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">PERSONAL</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $personal->nombre }}</p>
            <p><strong>Fecha de Nacimiento:</strong> {{ $personal->fechaNacimiento }}</p>
            <p><strong>Sexo:</strong>{{ $personal->sexo }}</p>
            <p><strong>Telefono:</strong>{{ $personal->telefono }}</p>
            <p><strong>Email:</strong>{{ $personal->email }}</p>
            <p><strong>Nit:</strong>{{ $personal->nit }}</p>
            <p><strong>Tipo:</strong>{{ $personal->tipo }}</p>
        </div>
    </div>

    <div class="form-group mt-2">
        <a href="{{ route('personal.edit', $personal) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('personal.index') }}" class="btn btn-danger">Cancelar</a>
    </div>

@stop