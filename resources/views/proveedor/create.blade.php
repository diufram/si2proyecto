@extends('adminlte::page')

@section('title', 'Agregar cliente')

@section('content_header')
    <h1>Agregar Proveedor</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-body">
                <form method="POST" action="{{ route('proveedor.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nombre</label>
                        <x-adminlte-input name="nombre" label-class="text-lightblue" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <x-adminlte-input name="numero" type="text" label-class="text-lightblue" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <x-adminlte-input name="email" id="email" type="email" placeholder="" label-class="text-lightblue" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label>País</label>
                        <x-adminlte-input name="pais" type="text" placeholder="" label-class="text-lightblue" />
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <x-adminlte-input name="descripcion" type="text" placeholder="" label-class="text-lightblue" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-save" />
                        <a href="{{ route('proveedor.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

