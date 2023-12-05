@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Personal</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('personal.update', $personal->id) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="nombre" label="Nombre" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $personal->nombre }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="fechaNacimiento" label="fechaNacimiento" type="text" placeholder=""
                    label-class="text-lightblue" value="{{ $personal->fechaNacimiento }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="sexo" label="sexo" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $personal->sexo }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="telefono" label="telefono" type="text" placeholder=""
                    label-class="text-lightblue" value="{{ $personal->telefono }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="email" label="email" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $personal->email }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="direccion" label="direccion" type="text" placeholder=""
                    label-class="text-lightblue" value="{{ $personal->direccion }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="nit" label="nit" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $personal->nit }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="tipo" label="tipo" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $personal->tipo }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="edad" label="edad" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $personal->edad }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mt-2">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('personal.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop
