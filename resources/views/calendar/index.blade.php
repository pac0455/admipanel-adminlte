@extends('adminlte::page')
@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{asset('/vendor/adminlte/dist/css/custom.css')}}">
@stop

@section('title', 'Prueba tecnica')

@section('content_header')
    <h1>Prueba tecnica</h1>
@stop

@section('content')
    <p class="prueba">Welcome to calendar.</p>
@stop


@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
