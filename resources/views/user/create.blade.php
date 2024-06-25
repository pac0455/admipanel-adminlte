@extends('adminlte::page')
@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/custom.css') }}">
@stop

@section('title', 'Prueba técnica')

@section('content_header')
    <h1><span class="fas fa-fw fa-users"></span> Editar usuarios</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
      <form action="{{ route('user.store') }}" method="POST">
          @csrf
          <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value='{{$name}}' placeholder="Nombre">
              @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
              <label for="email">Dirección de email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@gmail.com">
              @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña">
              @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
          </div>

          <div class="form-group">
              <label for="password_confirmation">Confirmar Contraseña</label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña">
              @error('password_confirmation')
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
