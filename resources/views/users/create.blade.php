@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Ingresar un nuevo usuario</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ route('users.store')}}">
    @csrf
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="name" name="name" placeholder="Ingrese sus nombres" value="{{ old('name') }}">
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Correo Electronico:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingres un correo electronico" value="{{ old('email') }}">
          </div>
          @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Contraseña:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese una contraseña" value="{{ old('old') }}">
          </div>
          @error('password')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Repite Contraseña</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password-confirm" name="password-confirm"  required autocomplete="new-password" placeholder="Confirme contraseña">
            </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-warning" href="{{ route('users.index') }}">Cancelar</a>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
@endsection