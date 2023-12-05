@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Cliente</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="nombre" label="Nombre" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $cliente->nombre }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="fechaNacimiento" label="fechaNacimiento" type="text" placeholder=""
                    label-class="text-lightblue" value="{{ $cliente->fechaNacimiento }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="sexo" label="sexo" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $cliente->sexo }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="telefono" label="telefono" type="text" placeholder=""
                    label-class="text-lightblue" value="{{ $cliente->telefono }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="email" label="email" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $cliente->email }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="direccion" label="direccion" type="text" placeholder=""
                    label-class="text-lightblue" value="{{ $cliente->direccion }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="nit" label="nit" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $cliente->nit }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="tipo" label="tipo" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $cliente->tipo }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="edad" label="edad" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $cliente->edad }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mt-2">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop
