@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">ALMACÉN</h1>
@stop

@section('content')

    {{-- BOTÓN DE CREACIÓN --}}
    <div class="form-group align-items-end">
        <x-adminlte-button label="Crear Almacén" class="bg-blue" title="Crear promocion" data-toggle="modal"
            data-target="#modalalmacen" />

        <x-adminlte-modal id="modalalmacen" title="Crear Almacén" size="lg" theme="dark" icon="fas fa-bell" v-centered
            static-backdrop scrollable>
            <form action="{{ route('almacen.store') }}" method="POST" enctype="multipart/form-data">
                @method('POST')
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Ubicación</label>
                        <input type="text" name="ubicacion" class="form-control" id="descripcion" autocomplete="off">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-left mt-3">Guardar</button>
                <button type="button" class="btn btn-secondary float-right mt-3" data-dismiss="modal">Cerrar</button>
                <x-slot name="footerSlot">
                </x-slot>
            </form>
        </x-adminlte-modal>
    </div>

    {{-- ESTA PARTE ES EL CUADRO QUE MUESTRA TODOS LOS DATOS --}}
    <div class = "card">
        <div class = "card-body">
            <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="white" hoverable with-buttons>

                @foreach ($almacenes as $almacen)
                    <tr>
                        <td>{{ $almacen->nombreAlmacen }}</td>
                        <td>{{ $almacen->ubicacion }}</td>
                        {{-- BOTONES DE ACCIONES --}}
                        <td width="15px">
                            <div class="d-flex">
                                {{-- BUTTON EDIT  --}}
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="edit"
                                    data-toggle="modal" data-target="#modalEditarAlmacen{{ $almacen->id }}">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                                {{-- MODAL EDIT --}}
                                <x-adminlte-modal id="modalEditarAlmacen{{ $almacen->id }}" title="Editar Almacén"
                                    size="lg" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                                    {{-- FORM EDIT --}}
                                    <form action="{{ route('almacen.update', $almacen) }}" method="POST" enctype="multipart/form-data">
                                        @method('PUT') {{-- Utilizamos el método PUT para actualizar el recurso --}}
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nombre">Nombre:</label>
                                                <input type="text" name="nombre" class="form-control" id="nombre"
                                                    value="{{ $almacen->nombreAlmacen }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion">Ubicación</label>
                                                <input type="text" name="ubicacion" class="form-control"
                                                    id="ubicacion" value="{{ $almacen->ubicacion }}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary float-left mt-3">Guardar</button>
                                        <button type="button" class="btn btn-secondary float-right mt-3"
                                            data-dismiss="modal">Cerrar</button>
                                        <x-slot name="footerSlot">
                                        </x-slot>
                                    </form>
                                </x-adminlte-modal>
                                {{-- boton de eliminar  --}}
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                    data-toggle="modal" data-target="#modalCustom{{ $almacen->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                                {{-- MODAL ELIMINAR --}}
                                <x-adminlte-modal id="modalCustom{{ $almacen->id }}" title="Eliminar" size="sm"
                                    theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>
                                    <div style="height:80px;">Esta seguro de eliminar: </div>
                                    <x-slot name="footerSlot">
                                        <form action="{{ route('almacen.destroy', $almacen->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <x-adminlte-button class="btn-flat" type="submit" label="Aceptar"
                                                theme="success" />
                                        </form>
                                        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                                    </x-slot>
                                </x-adminlte-modal>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
    </div>



@stop
