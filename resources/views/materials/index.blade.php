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
                  <th>Hora Entrada</th>
                  <th>Hora Salida</th>
                  <th>Observación</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
