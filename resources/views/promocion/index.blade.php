@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Promociones</h1>
@stop

@section('content')


<div class="form-group align-items-end">
     {{-- ---Custom modal-- --}}

        {{-- ---Custom modal-- --}}
        <x-adminlte-button label="Crear Promocion" class="bg-white" title="Crear promocion"
        data-toggle="modal" data-target="#modalpromocion" />

        <x-adminlte-modal id="modalpromocion" title="Crear Promocion" size="lg" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>    
            <form action="{{ route('promocion.store') }}" method="POST">
                        @method('POST') {{-- Utilizamos el método PUT para actualizar el recurso --}}
                        @csrf
                                
                                <x-adminlte-input name="nombre" label="Nombre" type="text" label="Nombre de la promocion" />
                                <x-adminlte-input name="procentajeDescuento" type="number" label="Porcentaje de descuento"/>
                                <x-adminlte-input name="descripcion" label="descripcion" type="text" label="Descripcion de la promocion" />
                                <x-adminlte-button  class="float-left mt-3" type="submit" label="Aceptar" theme="success" />   
                                <x-adminlte-button  class="btn btn-primary float-right mt-3" theme="danger" label="Cancelar" data-dismiss="modal" />
                                {{-- <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" /> --}}
                                <x-slot name="footerSlot" >
                                </x-slot>                   
            </form>
        </x-adminlte-modal>
</div>



<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" hoverable with-buttons>
            @if ($promociones->count() !=0)
        
            @foreach($promociones as $promocion)
                <tr>
                   
                    @if ($promocion->id != null) 
                                
                            
                        
                        <td>{{ $promocion->nombre }}</td>
                        <td>{{ $promocion->descripcion }}</td>
                        <td>{{ $promocion->procentajeDescuento }}</td>
                        <td width="15px">
                            <div class="d-flex">

                                {{-- esto es para el de editar membresía --}}
                                <a href="{{ route('promocion.edit', $promocion) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>

                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom{{ $promocion->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            <a href="{{ route('promocion.show', $promocion) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>  

                            </div>
                        </td>
                        {{-- Custom modal de eliminar --}}
                        <x-adminlte-modal id="modalCustom{{ $promocion->id }}" title="Eliminar" size="sm" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                            <div style="height: 50px;">¿Está seguro de eliminar la promocion?</div>
                            <x-slot name="footerSlot">
                                <form action="{{ route('promocion.destroy', $promocion) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="success" />
                                </form>
                                <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                            </x-slot>
                        </x-adminlte-modal>
                    @endif
                </tr>
            @endforeach
            @endif
        </x-adminlte-datatable>
    </div>
</div>
@stop