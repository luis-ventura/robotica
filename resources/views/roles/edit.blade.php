@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Editar un Rol</h3>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('roles.update', $roles->id)}}">
    @csrf
    @method('PUT')
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="name" name="name" placeholder="Edite un rol" value="{{ $roles->name }}">
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
              <span><b>Asignar Permisos</b></span>
            </div>
           @foreach ($permissions as $permission)
             <div class="form-check">
              <input class="form-check-input" type="checkbox" name="permissions[]" 
              @foreach ($roles->permissions as $p)
                  @if($permission->id == $p->id)
                      checked
                  @endif
              @endforeach value="{{ $permission->id.$roles->permissions }}">
              <label class="form-check-label">{{ $permission->name, ucfirst($permission->name) }}</label>          
             </div>
           @endforeach
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-warning" href="{{ route('roles.index') }}">Cancelar</a>
      </div>
      <!-- /.card-footer -->
    </form>
</div>
@endsection