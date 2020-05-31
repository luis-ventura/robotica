@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Agregar resgitro de material</h3>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('materials.update', $materials->id)}}">
    @csrf
    @method('PUT')
    <input hidden name="user_id" value="{{auth()->user()->id}}">
      <div class="card-body">
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
            <div class="col-sm-10">
              <input type="date" class="form-control @error('date_material') is-invalid @enderror" id="date_material" name="date_material" placeholder="Añada nombre del Permiso" value="{{ $materials->date_material }}">
            </div>
            @error('date_material')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="material" class="col-sm-2 col-form-label">Material:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('material') is-invalid @enderror" id="material" name="material" placeholder="Ingrese material pedido" value="{{ $materials->material }}">
            </div>
            @error('material')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group row">
            <label for="fecha" class="col-sm-2 col-form-label">Observación:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('observation') is-invalid @enderror" id="observation" name="observation" placeholder="Observación" value="{{ $materials->observation }}">
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
@endsection
