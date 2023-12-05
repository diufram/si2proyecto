@extends('adminlte::page')

@section('title', 'Lista de Clientes')

@section('content_header')
    <h1>PROVEEDORES</h1>
@stop

@section('content')
    @if (session('mensaje'))
        <div class="alert alert-success">
            <strong>{{ session('mensaje') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="white" with-buttons>

                <div class="btn btn-lg btn-default mb-3">
                    <a href="{{ route('proveedor.create') }}" class="text-primary">
                        <i class="fa fa-lg fa-fw fa-plus"></i>
                        Nuevo Proveedor</a>
                </div>

                @foreach ($proveedores as $proveedor)
                    
                <tr>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->correo }}</td>
                    <td>{{ $proveedor->pais }}</td>
                    <td>{{ $proveedor->descripcion }}</td>

                    <td width="15px"> {{-- esto es como una columna mas  --}}
                        <div class="d-flex"> {{-- esto es lo que hace que los datos esten uno al lado del otro --}}

                            {{-- boton de editar --}}
                            <a href="{{ route('proveedor.edit', $proveedor) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>

                            {{-- boton de eliminar --}}
                            <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                data-toggle="modal" data-target="#modalCustom{{ $proveedor->id }}">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>
                            <a href="{{route('proveedor.show',$proveedor)}}" class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>

                        </div>
                    </td>
                    
                    {{-- Custom Modal Eliminar --}}
                    <x-adminlte-modal id="modalCustom{{ $proveedor->id }}" title="Eliminar" size="sm" theme="dark"
                        icon="fas fa-bell" v-centered static-backdrop scrollable>
                        <div style="height:80px;">Esta seguro de eliminar: {{ $proveedor->nombre }} </div>
                        <x-slot name="footerSlot">

                            <form action="{{ route('proveedor.destroy', $proveedor->id) }}" method="POST">
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
