@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Proveedor</h1>
@stop
@section('content')
    <form method="POST" action="{{ route('proveedor.update', $proveedor->id) }}">
        @method("PUT")
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="" label-class="text-lightblue" value="{{ $proveedor->nombre }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="telefono" label="Teléfono" type="text" placeholder="" label-class="text-lightblue" value="{{ $proveedor->telefono }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="correo" label="Correo" type="email" placeholder="" label-class="text-lightblue" value="{{ $proveedor->correo }}" />
            </div> 
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="pais" label="País" type="text" placeholder="" label-class="text-lightblue" value="{{ $proveedor->pais }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="descripcion" label="Descripcion" type="text" placeholder="" label-class="text-lightblue" value="{{ $proveedor->descripcion }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mt-2">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('proveedor.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop