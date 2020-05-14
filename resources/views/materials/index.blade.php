@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bitacora de Materiales</h3>
            <div class="card-tools">
             <div class="btn-group">
                <a href="{{ route('materials.create') }}" class="btn btn-primary">Añadir Registro</a>
             </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Fecha</th>
                  <th>Matricula</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Material</th>
                  <th>Creado</th>
                  <th>Actualizado</th>
                  <th>Observación</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($materials as $material)
                <tr>
                 <td>{{ $material->id }}</td>
                 <td>{{ $material->date_material }}</td>
                 <td>{{ $material->user->control_number }}</td>
                 <td>{{ $material->user->name }}</td>
                 <td>{{ $material->user->lastname }}</td>
                 <td>{{ $material->material }}</td>
                 <td>{{ $material->created_at }}</td>
                 <td>{{ $material->updated_at }}</td>
                 <td>{{ $material->observation }}</td>
                 @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
