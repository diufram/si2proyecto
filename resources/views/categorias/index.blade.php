@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">CATEGORIA</h1>
@stop

@section('content')

    @if (session('mensaje'))
        <div class="alert alert-success">
            <strong>{{ session('mensaje') }}</strong>
        </div>
    @endif
    {{-- ---Custom crear-- --}}
    <div class="form-group align-items-end">

        <x-adminlte-button label="Crear Categoria" class="bg-white" title="Crear Categoria"
        data-toggle="modal" data-target="#modalcategoria" />

        <x-adminlte-modal id="modalcategoria" title="Crear Categoria" size="lg" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>    
            <form action="{{ route('categoria.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST') {{-- Utilizamos el método PUT para actualizar el recurso --}}
                        @csrf

                             <div class="modal-body">
                                 <div class="form-group">
                                     <label for="nombre">Nombre</label>
                                     <input type="text" name="nombre" class="form-control" id="nombre">
                                  </div>
                                  <div class="form-group">
                                     <label for="descripcion">Descripcion</label>
                                     <input type="text" name="descripcion" class="form-control" id="descripcion">
                                  </div>
                                  <div class="form-group">
                                     <label for="status">Estado</label>
                                     <select name="status" id="status" class="form-control">
                                         <option value="">ELEGIR ESTADO DE LA CATEGORIA</option>
                                         <option value="1">Activo</option>
                                         <option value="0">Inactivo</option>
                                     </select>
                                  </div>
                                  <div class="form-group">
                                     <label for="url">Imagen</label>
                                     <input type="file" name="url" class="form control" id="url">
                                  </div>

                             </div>     
                             <button type="submit" class="btn btn-primary float-left mt-3">Guardar</button>
                             <button type="button" class="btn btn-secondary float-right mt-3" data-dismiss="modal">Cerrar</button>
                             <x-slot name="footerSlot" >   
                             </x-slot>  
            </form>
        </x-adminlte-modal>
    </div>
    {{-- ---Custom crear-- --}}

    <div class = "card">
        <div class = "card-body">
            <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme="white" hoverable with-buttons>

                @php
                    $i = 1;
                @endphp
                @if (!$categorias->isEmpty())
                    @foreach ($categorias as $categoria)
                        <tr>

                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->descripcion }}</td>
                            {{-- <td>{{ $categoria->estado }}</td> --}}
                            <td>
                                <span
                                    class="{{ $categoria->status == 1 ? 'bg-primary' : 'bg-secondary' }} badge rounded-pill">{{ $categoria->status == 1 ? 'Activo' : 'Inactivo' }}</span>
                                {{-- <span class="badge rounded-pill ">Secondary</span> --}}
                            </td>

                            <td>
                                {{-- <img src="{{asset('storage').'/'.$categoria->url}}" alt="" width="200px" class="img-thumbnail"> --}}
                                <img src="{{ asset($categoria->url) }}" alt="{{ $categoria->title }}" width="100px"
                                    class="img-fluid img-thumbnail">
                            </td>

                            <td width="15px"> {{-- esto es como una columna mas  --}}
                                <div class="d-flex"> {{-- esto es lo que hace que los datos esten uno al lado del otro --}}
                                    {{-- boton de eliminar  --}}

                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="edit"
                                        data-toggle="modal" data-target="#modalEditarCategoria{{ $categoria->id }}">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>


                                    {{-- MODAL EDITAR --}}
                                    <x-adminlte-modal id="modalEditarCategoria{{ $categoria->id }}" title="Editar Promocion"
                                        size="lg" theme="dark" icon="fas fa-bell" v-centered static-backdrop
                                        scrollable>
                                        <form action="{{ route('categoria.update', $categoria) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @method('PUT') {{-- Utilizamos el método PUT para actualizar el recurso --}}
                                            @csrf

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input type="text" name="nombre" class="form-control" id="nombre"
                                                        value="{{ $categoria->nombre }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="descripcion">Descripcion</label>
                                                    <input type="text" name="descripcion" class="form-control"
                                                        id="descripcion" value="{{ $categoria->descripcion }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Estado</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="">ELEGIR CATEGORIA</option>
                                                        <option value="1">Activo</option>
                                                        <option value="0">Inactivo</option>
                                                        <option value="1"
                                                            {{ $categoria->status == '1' ? 'selected' : '' }}>Masculino
                                                        </option>
                                                        <option value="0"
                                                            {{ $categoria->status == '0' ? 'selected' : '' }}>Femenino
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="url">Imagen</label>
                                                    <input type="file" name="url" class="form control"
                                                        id="url">
                                                </div>

                                            </div>
                                            <button type="submit"
                                                class="btn btn-primary float-left mt-3">Guardar</button>
                                            <button type="button" class="btn btn-secondary float-right mt-3"
                                                data-dismiss="modal">Cerrar</button>
                                            <x-slot name="footerSlot">
                                            </x-slot>
                                        </form>
                                    </x-adminlte-modal>
                                    {{-- MODAL EDITAR --}}






                                    {{-- boton de eliminar  --}}
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                                        data-toggle="modal" data-target="#modalCustom{{ $categoria->id }}">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                    {{-- MODAL ELIMINAR --}}
                                    <x-adminlte-modal id="modalCustom{{ $categoria->id }}" title="Eliminar"
                                        size="sm" theme="dark" icon="fas fa-bell" v-centered static-backdrop
                                        scrollable>
                                        <div style="height:80px;">Esta seguro de eliminar </div>
                                        <x-slot name="footerSlot">

                                            <form action="{{ route('categoria.destroy', $categoria->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <x-adminlte-button class="btn-flat" type="submit" label="Aceptar"
                                                    theme="success" />
                                            </form>
                                            <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                                        </x-slot>
                                    </x-adminlte-modal>
                                    {{-- MODAL ELIMINAR --}}

                                </div>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                @endif

            </x-adminlte-datatable>
        </div>
    </div>
@stop
