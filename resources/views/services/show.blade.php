@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sitio: {{''.$site->nombre}}</h1>
    <p>Descripcion: {{''.$site->descripcion}}</p>
   
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop