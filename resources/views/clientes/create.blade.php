@extends('adminlte::page')

@section('title', 'Agregar cliente')

@section('content_header')
    <h1>Agregar cliente</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>'clientes.store']) !!}

            <div class="form-group">
                {!! Form::label('nombre','Nombre')!!}
                {!! Form::text('nombre',null, ['class'=>'form-control', 'placeholder'=> 'nombre del cliente']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('fecha de nacimiento','fecha de nacimiento')!!}
                {!! Form::date('fechaNacimiento',null, ['class'=>'form-control', 'placeholder'=> 'nombre del cliente']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('sexo','Sexo')!!}
                {!! Form::text('sexo',null, ['class'=>'form-control', 'placeholder'=> 'nombre del cliente']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('telefono','Telefono')!!}
                {!! Form::number('telefono',null, ['class'=>'form-control', 'placeholder'=> 'telefono del cliente']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','Email')!!}
                {!! Form::email('email',null, ['class'=>'form-control', 'placeholder'=> 'email del cliente']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password','Password')!!}
                {!! Form::text('password',null, ['class'=>'form-control', 'placeholder'=> 'Contraseña']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('direccion','Direccion')!!}
                {!! Form::text('direccion',null, ['class'=>'form-control', 'placeholder'=> 'direccion del cliente']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nit','Nit')!!}
                {!! Form::number('nit',null, ['class'=>'form-control', 'placeholder'=> 'nit del cliente']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tipo','Tipo')!!}
                {!! Form::text('tipo',null, ['class'=>'form-control', 'placeholder'=> '']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('edad','Edad')!!}
                {!! Form::number('edad',null, ['class'=>'form-control', 'placeholder'=> 'edad del cliente']) !!}
            </div>
                {!! Form::submit('Guardar cliente', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
