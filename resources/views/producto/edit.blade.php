@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Producto</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('producto.update', $producto->id) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="categoria_id" label="Categoria_Id" type="text" placeholder=""
                    label-class="text-lightblue" value="{{ $producto->categoria_id }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="nombre" label="Nombre" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $producto->nombre }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="precio" label="Precio" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $producto->precio }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="imagen" label="Imagen" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $producto->imagen }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="stock" label="stock" type="text" placeholder="" label-class="text-lightblue"
                    value="{{ $producto->stock }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="descripcion" label="Descripcion" type="text" placeholder=""
                    label-class="text-lightblue" value="{{ $producto->descripcion }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="disponibilida" label="Disponibilida" type="text" placeholder=""
                    label-class="text-lightblue" value="{{ $producto->disponibilida }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mt-2">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('producto.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop
