@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Editar Ambiente</h1>
@stop
@section('content')
    <form method="POST" action="{{ route('ambiente.update', $id_ambiente->id) }}">
        @method("PUT")
        @csrf
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="nombre" label="Nombre" type="text" placeholder="" label-class="text-lightblue" value="{{ $id_ambiente->nombre }}" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="cantidad" label="Cantidad" type="number" placeholder="" label-class="text-lightblue" value="{{ $id_ambiente->cantidaMesa }}" />
            </div> 
        </div>
        <div class="row">
            <div class="col-md-6">
                <x-adminlte-input name="descripcion" label="Descripcion" type="text" placeholder="" label-class="text-lightblue" value="{{ $id_ambiente->descripcion }}" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mt-2">
                <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" />
                <a href="{{ route('ambiente.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@stop