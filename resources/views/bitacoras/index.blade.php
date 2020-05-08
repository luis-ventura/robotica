@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bitacoras</h3>
            <div class="card-tools">
             <div class="btn-group">
                <a href="{{ route('users.index') }}" class="btn btn-primary">Bitacora Residencia</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-success">Bitacora Servicio Social</a>
             </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">ID</th>
                  <th style="width: 25px">Fecha</th>
                  <th>N° Control</th>
                  <th style="width: 05%">Alumno</th>
                  <th style="width: 05%">Asesor</th>
                  <th>Firma</th>
                  <th>Hora Entrada</th>
                  <th>Hora Salida</th>
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
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
