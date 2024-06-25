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
    @include('components.modal')
    <div id="calendar"></div>
@stop


@section('js')
    <script >

    </script>
@stop
