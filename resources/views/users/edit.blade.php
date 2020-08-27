@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Actualizar datos</h3>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('users.update',$users->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombres:</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" name="name" placeholder="Ingrese sus nombres" value="{{ $users->name }}">
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
            <input type="name" class="form-control" name="lastname" placeholder="Ingrese sus apellidos" value="{{ $users->lastname }}">
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
            <input type="email" class="form-control" name="email" placeholder="Ingres un correo electronico" value="{{ $users->email }}">
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
              <input class="form-check-input" type="checkbox" name="roles[]"
              @foreach($users->roles as $ur )
                @if($role->id == $ur->id)
                    checked
                @endif
              @endforeach value="{{ $role->id.$users->roles }}">
              <label class="form-check-label">{{ $role->name, ucfirst($role->name) }}</label>
            </div>
           @endforeach
        </div>
        <div class="form-group row">
          <label for="control_number" class="col-sm-2 col-form-label">Número Control:</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" name="control_number" value="{{ $users->control_number }}">
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
                @if($users->career == null)
                <option selected disabled>Agregue su carrera</option>
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
                @else
                <option>{{ $users->career }}</option>
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
                @endif
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
             @if($users->activity == null)
                <option>Agregue Actividad</option>
                @role('administrador')
                    <option>Maestro</option>
                    <option>Coordinador</option>
                @endrole
                <option>Residencia</option>
                <option>Servicio Social</option>
                <option>Cursando Semestre</option>
             @else
                <option>{{ $users->activity }}</option>
                @role('administrador')
                        <option>Maestro</option>
                        <option>Coordinador</option>
                @endrole
                <option>Residencia</option>
                <option>Servicio Social</option>
                <option>Cursando Semestre</option>
             @endif
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
            <input type="file" class="form-control" name="avatar">
          </div>
          @error('avatar')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
       </div>
       <div class="form-group row">
           <label class="col-sm-3 col-form-label">Contraseña: <span class="small">(Opcional)</span> </label>
           <div class="col-sm-9">
               <input type="password" class="form-control" name="password" placeholder="Escriba nueva contraseña">
           </div>
       </div>
       <div class="form-group row">
        <label class="col-sm-3 col-form-label">Confirme Contraseña: <span class="small">(Opcional)</span> </label>
        <div class="col-sm-9">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme nueva contraseña">
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
