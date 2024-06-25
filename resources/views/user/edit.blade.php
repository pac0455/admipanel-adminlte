@extends('adminlte::page')
@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/custom.css') }}">
@stop

@section('title', 'Prueba técnica')

@section('content_header')
    <h1><span class="fas fa-fw fa-users"></span> Crear usuarios</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
      <form action="{{ route('user.update', ['user'=> $user->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name}}" placeholder="Nombre">
          </div>

          <div class="form-group">
              <label for="email">Dirección de email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" placeholder="ejemplo@gmail.com">
          </div>

          <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{ old('password')}}" id="password" name="password" placeholder="Contraseña">
              @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <button type="submit" class="btn btn-primary">Crear</button>
      </form>
  </div>
</div>

@stop

@section('js')
    <script>
        // Aquí puedes agregar algún script adicional si es necesario
    </script>
@stop
