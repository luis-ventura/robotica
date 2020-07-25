@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Ingresar un nuevo usuario</h3>
    </div>
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ route('users.store')}}">
    @csrf
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="Ingrese sus nombres" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombres">
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
            <input type="email" class="form-control" name="email" placeholder="Ingres un correo electronico" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electrónico">
          </div>
          @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
          <div class="col-sm-2">
            <span><b>Asignar un Rol</b></span>
          </div>
         @foreach ($roles as $role)
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}">
            <label class="form-check-label">{{ $role->name, ucfirst($role->name) }}</label>
          </div>
         @endforeach
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-2 col-form-label">Contraseña:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" placeholder="Ingrese una contraseña" value="{{ old('password') }}">
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
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  required autocomplete="new-password" placeholder="Confirme contraseña">
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
