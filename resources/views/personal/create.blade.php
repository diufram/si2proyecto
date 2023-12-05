@extends('adminlte::page')

@section('title', 'Agregar Personal')

@section('content_header')
    <h1>Agregar Personal</h1>
@stop

@section('content')
    <p></p>
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'personal.store']) !!}

            <div class="form-group">
                {!! Form::label('nombre','Nombre')!!}
                {!! Form::text('nombre',null, ['class'=>'form-control', 'placeholder'=> 'nombre del cliente']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('fecha de nacimiento','fecha de nacimiento')!!}
                {!! Form::date('fechaNacimiento',null, ['class'=>'form-control', 'placeholder'=> '']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sexo','Sexo')!!}
                {!! Form::text('sexo',null, ['class'=>'form-control', 'placeholder'=> 'introduzaca su sexo']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono','Telefono')!!}
                {!! Form::number('telefono',null, ['class'=>'form-control', 'placeholder'=> 'introduzaca su telefono']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email')!!}
                {!! Form::email('email',null, ['class'=>'form-control', 'placeholder'=> 'introduzaca su email']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password')!!}
                {!! Form::text('password',null, ['class'=>'form-control', 'placeholder'=> 'introduzaca su Contraseña']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('direccion','Direccion')!!}
                {!! Form::text('direccion',null, ['class'=>'form-control', 'placeholder'=> 'introduzaca su direccion']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nit','Nit')!!}
                {!! Form::number('nit',null, ['class'=>'form-control', 'placeholder'=> 'nit']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tipo','Tipo')!!}
                {!! Form::text('tipo',null, ['class'=>'form-control', 'placeholder'=> '']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('edad','Edad')!!}
                {!! Form::number('edad',null, ['class'=>'form-control', 'placeholder'=> 'introduzaca su edad']) !!}
            </div>
            <div class="form-group">
                        <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-save" />
                        <a href="{{ route('personal.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>

            
            {!! Form::close() !!}
        </div>
    </div>
@stop