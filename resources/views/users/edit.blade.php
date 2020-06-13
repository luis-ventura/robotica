@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Actualizar datos</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ route('users.update',$users->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombres:</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="name" name="name" placeholder="Ingrese sus nombres" value="{{ $users->name }}">
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
          <label for="lastname" class="col-sm-2 col-form-label">Apellidos:</label>
          <div class="col-sm-10">
            <input type="name" class="form-control" id="name" name="lastname" placeholder="Ingrese sus apellidos" value="{{ $users->lastname }}">
          </div>
          @error('lastname')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Correo Electronico:</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingres un correo electronico" value="{{ $users->email }}">
          </div>
          @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
          <label for="control_number" class="col-sm-2 col-form-label">Número Control:</label>
          <div class="col-sm-10">
            <input type="control_number" class="form-control" id="control_number" name="control_number" placeholder="Ingres un numero de control" value="{{ $users->control_number }}">
          </div>
          @error('control_number')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
          <label for="career" class="col-sm-2 col-form-label">Carrera</label>
          <div class="col-sm-10">
            <select name="career" class="form-control">
              <option>Ingenieria en sistemas computacionales</option>
              <option>Ingenieria en TIC'S</option>
              <option>Ingenieria Informatica</option>
              <option>Ingenieria Ambiental</option>
              <option>Ingenieria Bioquimica</option>
              <option>Ingenieria Quimica</option>
              <option>Ingenieria Industrial</option>
            </select>
          </div>
          @error('career')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group row">
          <label for="activity" class="col-sm-2 col-form-label">Actividad:</label>
          <div class="col-sm-10">
            <select name="activity" class="form-control">
              @role('administrador')
              <option>Maestro</option>
              @endrole
              @role('cordinador')
              <option>Coordinador</option>
              @endrole
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
          <label class="col-sm-2 col-form-label">Avatar</label>
          <div class="col-sm-10">
            <input type="file" class="form-control" name="avatar" value="{{ $users->avatar }}">
          </div>
          @error('avatar')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
       </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-warning" href="{{ route('users.show',$users->id) }}">Cancelar</a>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
@endsection
