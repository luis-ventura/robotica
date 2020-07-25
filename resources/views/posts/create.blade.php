@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Agregar Pregunta</h3>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('posts.store')}}">
    @csrf
      <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Tema:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="title" placeholder="Titulo" value="{{ old('title') }}">
            </div>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Pregunta:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="description" placeholder="descripcion" value="{{ old('description') }}">
            </div>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-warning" href="{{ route('posts.index') }}">Cancelar</a>
      </div>
      <!-- /.card-footer -->
    </form>
</div>
@endsection
