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
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Numero de control:</label>
            <div class="col-sm-10">
            <input id="control_number" type="text" class="form-control @error('control_number') is-invalid @enderror" name="control_number" value="{{ old('control_number') }}" required autocomplete="control_number" autofocus placeholder="Numero de Control">
            </div>
            @error('control_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
           <label class="col-sm-2 col-form-label">Actividad:</label>
           <div class="col-sm-10">
           <select name="activity" class="form-control">
            <option selected disabled> Seleccione Actividad</option>
            <option>Residencia</option>
            <option>Servicio Social</option>
            <option>Cursando Semestre</option>
           </select>
           </div>
            @error('activity')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
            @enderror
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Carrera:</label>
            <div class="col-sm-10">
            <select name="career" class="form-control">
                <option selected disabled >Agregar Carrera</option>
                <option>Ingenieria Bioquimica</option>
                <option>Ingenieria Quimica</option>
                <option>Ingenieria Ambiental</option>
                <option>Ingenieria en Sistemas computacionales</option>
                <option>Ingenieria en TIC'S</option>
                <option>Ingenieria Informatica</option>
                <option>Ingenieria en Gestión Empresarial</option>
                <option>Ingenieria Civil</option>
                <option>Ingenieria Industrial</option>
                <option>Ingenieria Petrolera</option>
                <option>Licenciatura en Administración</option>
            </select>
            </div>
            @error('career')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
            @enderror
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
