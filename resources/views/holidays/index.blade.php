@extends('adminlte::page')
@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/custom.css') }}">
@stop

@section('title', 'Listado holidays')

@section('content_header')
    <h1><span class="fas fa-fw fa-calendar"></span> Listado de festivos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="table_holidays" class="table table-striped">
                <thead>
                    <tr class="bg-primary table-bordered">
                        <th scope="col">ID</th>
                        <th scope="col">Día</th>
                        <th scope="col">Mes</th>
                        <th scope="col">Año</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($holidays as $holiday)
                        <tr>
                            <th scope="row">{{ $holiday->id }}</th>
                            <th scope="row">{{ $holiday->day }}</th>
                            <th scope="row">{{ $holiday->month }}</th>
                            <th scope="row">{{ $holiday->year }}</th>
                            <th scope="row">
                                <form action="{{route('calendar.destroy', ['calendar' => $holiday->id])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn bg-danger"><i class="fa fas fa-trash"></i></button>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <script>

        let table = new DataTable('#table_holidays', {
            responsive: true,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/es-ES.json',
            }
        });
    </script>
@stop
