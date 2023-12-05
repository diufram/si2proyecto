@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">INSUMOS</h1>
@stop

@section('content')

    @if (session('mensaje'))
        <div class="alert alert-success">
            <strong>{{ session('mensaje') }}</strong>
        </div>
    @endif
    {{-- ---Custom crear-- --}}
    <div class="form-group align-items-end">
        <x-adminlte-button label="Crear Insumo" class="bg-white" title="Crear Insumo"
        data-toggle="modal" data-target="#modalcategoria" />

        <x-adminlte-modal id="modalcategoria" title="Crear Insumo" size="lg" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>    
            <form action="{{ route('insumo.store') }}" method="POST" >
                        @method('POST') {{-- Utilizamos el método PUT para actualizar el recurso --}}
                        @csrf

                             <div class="modal-body">
                                 <div class="form-group">
                                     <label for="nombre">Nombre</label>
                                     <input type="text" name="nombre" class="form-control" id="nombre">
                                  </div>
                                  <div class="form-group">
                                    <label for="status">Estado</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">ELEGIR Estado</option>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <input type="number" name="stock" class="form-control" id="stock">
                                 </div>
                                 <div class="form-group">
                                    <label for="unidad">Unidad de Medida</label>
                                    <select name="unidad" id="unidad" class="form-control">
                                        <option value="">ELEGIR UNIDAD</option>
                                        <option value="10">KILOS</option>
                                        <option value="11">LITROS</option>
                                        <option value="12">UNIDADES</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="fechaCompra">Fecha de Compra</label>
                                    <input type="date" name="fechaCompra" class="form-control" id="fechaCompra">
                                 </div>
                                 <div class="form-group">
                                    <label for="fechaVencimiento">Fecha Vencimiento</label>
                                    <input type="date" name="fechaVencimiento" class="form-control" id="fechaVencimiento">
                                 </div>
                                 <div class="form-group">
                                    <label for="minimoStock">limite minimo de Stock</label>
                                    <input type="number" name="minimoStock" class="form-control" id="minimoStock">
                                 </div>
                                 <div class="form-group">
                                    <label for="almacen_id">Almacen</label>
                                    <select name="almacen_id" id="almacen_id" class="form-control" required>
                                        @foreach ($almacenes as $almacen)
                                        <option value="{{$almacen->id}}">{{$almacen->nombreAlmacen}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="proveedor_id">Proveedor</label>
                                    <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                                        @foreach ($proveedores as $proveedor)
                                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                        @endforeach
                                    </select>
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
                @if (!$insumos->isEmpty())
                @foreach ($insumos as $insumo)
                    <tr>
                         
                        <td>{{ $insumo->nombre }}</td>
                         
                        <td>
                            <span class="{{ ($insumo->status == 1 ) ? 'bg-primary' : 'bg-secondary' }} badge rounded-pill">{{ ($insumo->status == 1 ) ? 'Activo' : 'Inactivo' }}</span>
                            {{-- <span class="badge rounded-pill ">Secondary</span> --}}
                        </td>
                        <td>{{ $insumo->stock }}</td>
                        <td>{{ $insumo->unidad }}</td>
                        <td>{{ $insumo->fechaCompra }}</td>
                        <td>{{ $insumo->fechaVencimiento }}</td>
                        <td>{{ $insumo->almacen_id }}</td>


                        <td width="15px"> {{-- esto es como una columna mas  --}}
                            <div class="d-flex"> {{-- esto es lo que hace que los datos esten uno al lado del otro --}}
                                {{-- boton de eliminar  --}}

                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="edit" data-toggle="modal" data-target="#modalEditarCategoria{{ $insumo->id }}">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>


                                {{-- MODAL EDITAR--}}
                                <x-adminlte-modal id="modalEditarCategoria{{ $insumo->id }}" title="Editar Insumo" size="lg" theme="dark" icon="fas fa-bell" v-centered static-backdrop scrollable>    
                                    <form action="{{ route('insumo.update',$insumo) }}" method="POST" enctype="multipart/form-data">
                                                @method('PUT') {{-- Utilizamos el método PUT para actualizar el recurso --}}
                                                @csrf
                                                 
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input type="text" name="nombre" class="form-control" id="nombre" value={{$insumo->nombre}}>
                                                     </div>
                                                     <div class="form-group">
                                                       <label for="status">Estado</label>
                                                       <select name="status" id="status" class="form-control">
                                                           <option value="">ELEGIR Estado</option>
                                                           {{-- <option value="1">Activo</option>
                                                           <option value="0">Inactivo</option> --}}
                                                           <option value="1" {{ $insumo->status == '1' ? 'selected' : '' }}>Activo</option>
                                                            <option value="0" {{ $insumo->status == '0' ? 'selected' : '' }}>Inactivo</option>
                                                       </select>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="stock">Stock</label>
                                                       <input type="number" name="stock" class="form-control" id="stock" value={{$insumo->stock}}>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="unidad">Unidad de Medida</label>
                                                       <select name="unidad" id="unidad" class="form-control">
                                                           <option value="">ELEGIR UNIDAD</option>
                                                           {{-- <option value="10">KILOS</option>
                                                           <option value="11">LITROS</option>
                                                           <option value="12">UNIDADES</option> --}}
                                                           <option value="10" {{ $insumo->unidad == '10' ? 'selected' : '' }}>KILOS</option>
                                                           <option value="11" {{ $insumo->unidad == '11' ? 'selected' : '' }}>LITROS</option>
                                                           <option value="12" {{ $insumo->unidad == '12' ? 'selected' : '' }}>UNIDADES</option>
                                                       </select>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="fechaCompra">Fecha de Compra</label>
                                                       <input type="date" name="fechaCompra" class="form-control" id="fechaCompra" value={{$insumo->fechaCompra}}>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="fechaVencimiento">Fecha Vencimiento</label>
                                                       <input type="date" name="fechaVencimiento" class="form-control" id="fechaVencimiento" value={{$insumo->fechaVencimiento}}>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="minimoStock">limite minimo de Stock</label>
                                                       <input type="number" name="minimoStock" class="form-control" id="minimoStock" value={{$insumo->minimoStock}}>
                                                    </div>
                                                    <div class="form-group">
                                                       <label for="almacen_id">Almacen</label>
                                                       <select name="almacen_id" id="almacen_id" class="form-control" required>
                                                           @foreach ($almacenes as $almacen)
                                                           <option value="{{$almacen->id}}" {{ $almacen->id == $insumo->almacen_id ? 'selected' : '' }}>{{$almacen->nombreAlmacen}}</option>
                                                           @endforeach
                                                       </select>
                                                   </div>
                                                   <div class="form-group">
                                                       <label for="proveedor_id">Proveedor</label>
                                                       <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                                                           @foreach ($proveedores as $proveedor)
                                                           <option value="{{$proveedor->id}}" {{ $proveedor->id == $insumo->proveedor_id ? 'selected' : '' }}>{{$proveedor->nombre}}</option>
                                                           @endforeach
                                                       </select>
                                                   </div>   
                                                   <button type="submit" class="btn btn-primary float-left mt-3">Guardar</button>
                                                   <button type="button" class="btn btn-secondary float-right mt-3" data-dismiss="modal">Cerrar</button>
                                                   <x-slot name="footerSlot" >   
                                                   </x-slot>  
                                    </form>
                                </x-adminlte-modal>
                                {{-- MODAL EDITAR--}}

                                {{-- boton de eliminar  --}}
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete" data-toggle="modal" data-target="#modalCustom{{ $insumo->id }}">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                                {{-- MODAL ELIMINAR--}}
                                <x-adminlte-modal id="modalCustom{{ $insumo->id }}" title="Eliminar" size="sm" theme="dark"
                                    icon="fas fa-bell" v-centered static-backdrop scrollable>
                                    <div style="height:80px;">Esta seguro de eliminar </div>
                                    <x-slot name="footerSlot">

                                        <form action="{{ route('insumo.destroy', $insumo->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <x-adminlte-button class="btn-flat" type="submit" label="Aceptar"
                                                theme="success" />
                                        </form>
                                        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
                                    </x-slot>
                                </x-adminlte-modal>
                                {{-- MODAL ELIMINAR--}}

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
