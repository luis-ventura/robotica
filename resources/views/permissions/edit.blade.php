@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Editar un Permiso</h3>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('permissions.update', $permissions->id)}}">
    @csrf
    {!! method_field('PUT') !!}
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="name" name="name" placeholder="Añada nombre del Permiso" value="{{ $permissions->name }}">
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-warning" href="{{ route('permissions.index') }}">Cancelar</a>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
</div>
@endsection