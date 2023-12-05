
@extends('adminlte::page')

@section('title', 'Lista de Clientes')

@section('content_header')
    <h1>Log</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Contenido del archivo de registro</div>
        <div class="card-body">
            <pre>{{ $logContent }}</pre>
        </div>
    </div>
</div>
@stop