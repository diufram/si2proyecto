@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Roles</h1>
@stop

@section('content')
{{-- @if (session('success'))
    <x-adminlte-alert id="success-alert" theme="success" title="Success">
        {{ session('success') }}
    </x-adminlte-alert>
    <script>
        setTimeout(function(){
            document.getElementById('success-alert').style.display = 'none';
        }, 5000); // Cambia 5000 por la duración en milisegundos que deseas (por ejemplo, 5000 para 5 segundos)
    </script>
@endif
@if (session('deleted'))
    <x-adminlte-alert id="success-alert" theme="success" title="Success">
        {{ session('deleted') }}
    </x-adminlte-alert>
    <script>
        setTimeout(function(){
            document.getElementById('success-alert').style.display = 'none';
        }, 5000); // Cambia 5000 por la duración en milisegundos que deseas (por ejemplo, 5000 para 5 segundos)
    </script>
@endif --}}
{{-- <div class="form-group align-items-end">
    <div class="btn btn-lg btn-default" >
        <a href="{{ route('create/estimate/page') }}" class="text-dark" >
            <i class="fa fa-lg fa-fw fa-plus"></i>
            Nueva Venta</a>
    </div>
</div> --}}

<div class="form-group align-items-end">
{{-- ---Custom modal-- --}}
     <x-adminlte-modal id="modalpromocion" title="Crear Rol" size="lg" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>

        <form action="{{ route('role.store') }}" method="POST">
                    @method('POST') {{-- Utilizamos el método PUT para actualizar el recurso --}}
                    @csrf
                            
                            <x-adminlte-input name="nombre" label="Nombre"/>
                            
                            <div class ="text-right">
                                <x-adminlte-button  class="float-left mt-3" type="submit" label="Aceptar"
                                theme="success" />

                                <x-adminlte-button  class="btn btn-primary float-right mt-3" theme="danger" label="Cancelar" data-dismiss="modal" />
                            </div>
                            <x-slot name="footerSlot" >
                            </x-slot>
        </form>

    </x-adminlte-modal>
{{-- ---Custom modal-- --}}
        <x-adminlte-button label="Crear Rol" class="bg-blue" title="Crear promocion" data-toggle="modal" data-target="#modalpromocion" />
</div>



<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" hoverable with-buttons>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>

                    <td width="15px">
                        <div class="d-flex">

                             {{-- esto es para el de editar membresía --}}
                            <a href="{{ route('role.edit', $role) }}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>

                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom{{ $role->id }}">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                           <a href="{{ route('role.show', $role) }}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>  

                        </div>
                    </td>
                    {{-- Custom modal de eliminar --}}
                    <x-adminlte-modal id="modalCustom{{ $role->id }}" title="Eliminar" size="sm" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                        <div style="height: 50px;">¿Está seguro de eliminar el rol?</div>
                        <x-slot name="footerSlot">
                            <form action="{{ route('role.destroy', $role) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <x-adminlte-button class="btn-flat" type="submit" label="Aceptar" theme="success" />
                            </form>
                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                        </x-slot>
                    </x-adminlte-modal>
                </tr>
            @endforeach
        </x-adminlte-datatable>
    </div>
</div>
@stop