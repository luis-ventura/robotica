@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Editar registro Servicio Social</h3>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('bitacoraservicio.update', $bitacoraservicio->id)}}">
    @csrf
    @method('PUT')
      <div class="card-body">
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
            <div class="col-sm-10">
              <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ $bitacoraservicio->date }}">
            </div>
            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="adviser" class="col-sm-2 col-form-label">Asesor:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('adviser') is-invalid @enderror" id="adviser" name="adviser" placeholder="Ingrese nombre completo del asesor" value="{{ $bitacoraservicio->adviser }}">
            </div>
            @error('adviser')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Hora Salida:</label>
            <div class="col-sm-10">
              <input type="datetime" class="form-control @error('updated_at') is-invalid @enderror" name="updated_at"  value="{{ $bitacoraservicio->updated_at }}">
            </div>
            @error('updated_at')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-warning" href="{{ route('bitacoraservicio.index') }}">Cancelar</a>
      </div>
      <!-- /.card-footer -->
    </form>
</div>
@endsection
