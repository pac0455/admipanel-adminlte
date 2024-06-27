@extends('adminlte::page')
@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/custom.css') }}">
    @vite(['resources/js/app.js'])
@stop

@section('title', 'Prueba tecnica')

@section('content_header')
    <h1>Calendario</h1>
@stop

@section('content')
<div id="calendar"></div>
@include('components.add')
@include('components.info')
@include('components.edit')
@stop


@section('js')
    <script >

    </script>
@stop
