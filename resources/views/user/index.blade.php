@extends('adminlte::page')
@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/custom.css') }}">
@stop

@section('title', 'Prueba técnica')

@section('content_header')
    <h1><span class="fas fa-fw fa-users"></span> Listado de usuarios</h1>
    <div class="my-1">

        <button class="custom-blue text-white btn btn-lg custom-btn"><i class="fas fa fa-fw fa-trash"></i></button>
        <a href="{{ route('user.create') }}" class="custom-blue text-white btn btn-lg custom-btn"><i
                class="fas fa fa-fw fa-plus"></i></a>
        <button class="custom-blue text-white btn btn-lg custom-btn"><i class="fas fa fa-fw fa-edit"></i></button>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="table_users" class="table table-striped">
                <thead>
                    <tr class="bg-primary table-bordered">
                        <th scope="col">Código</th>
                        <th scope="col">Login</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @php
                            $nameParts = explode(' ', $user->name);
                            $name = $nameParts[0];
                            $apellidos = isset($nameParts[1]) ? $nameParts[1] : '';
                            $apellidos .= isset($nameParts[2]) ? ' ' . $nameParts[2] : '';

                            // Comprobar si el usuario está autenticado
                            $isLoggedIn = Auth::check() && Auth::user()->id === $user->id;
                        @endphp
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>
                                <i
                                    class="{{ $isLoggedIn ? 'fas fa-fw fa-check text-success' : 'fas fa-fw fa-times text-danger' }}"></i>
                            </td>
                            <td>{{ $name }}</td>
                            <td>{{ $apellidos }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3">
                <!-- Mostrar siempre la paginación -->
                {{ $users->appends(['paginate' => $paginate])->links() }}
            </div>
        </div>
    </div>



@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <script>
        let table = new DataTable('#table_users', {
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-ES.json',
            }
        });
    </script>
@stop
