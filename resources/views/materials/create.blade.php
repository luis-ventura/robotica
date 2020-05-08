@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Agregar un Permiso</h3>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('materials.store')}}">
    @csrf
      <div class="card-body">
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="date_material" name="date_material" placeholder="Añada nombre del Permiso" value="{{ old('date_material') }}">
            </div>
            @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Matricula:</label>
            <div class="col-sm-10">
              <select class="form-control">
                @foreach ($users as $user)
                 <option>Seleccione Matricula</option>
                 <option>{{ $user->control_number }}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Nombre:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="Añada nombre del Permiso" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Apellido:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="Añada nombre del Permiso" value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="material" class="col-sm-2 col-form-label">Material:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="material" name="material" placeholder="Ingrese material pedido" value="{{ old('material') }}">
            </div>
            @error('material')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Hora Entrada:</label>
            <div class="col-sm-10">
              <input type="datetime" class="form-control" id="entry_time" name="entry_time" placeholder="Hora de Entrada" value="{{ old('entry_time') }}">
            </div>
            @error('entry_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Hora Salida:</label>
            <div class="col-sm-10">
              <input type="datetime" class="form-control" id="departure_time" name="departure_time" placeholder="Hora de Salida" value="{{ old('departure_time') }}">
            </div>
            @error('departure_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Observación:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="observation" name="observation" placeholder="Observación" value="{{ old('observation') }}">
            </div>
            @error('observation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-warning" href="{{ route('materials.index') }}">Cancelar</a>
      </div>
      <!-- /.card-footer -->
    </form>
  </div>
</div>
@endsection
