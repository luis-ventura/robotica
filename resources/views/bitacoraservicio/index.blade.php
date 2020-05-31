@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bitacora de Servicio Social</h3>
            <div class="card-tools">
             <div class="btn-group">
                <a href="{{ route('bitacoraservicio.create') }}" class="btn btn-success">Añadir Registro</a>
             </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 2%">ID</th>
                  <th style="width: 10%">Fecha</th>
                  <th style="width: 8%">Matricula</th>
                  <th style="width: 10%">Nombre</th>
                  <th style="width: 10%">Apellido</th>
                  <th style="width: 10%">Asesor</th>
                  <th style="width: 10%">Firma</th>
                  <th style="width: 10%">Creado</th>
                  <th style="width: 10%">Actualizado</th>
                  <th style="width: 5%">Editar</th>
                  <th style="width: 5%">Borrar</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($bitacoraservicio as $servicio)
                  <tr>
                      <td>{{ $servicio->id }}</td>
                      <td>{{ $servicio->date }}</td>
                      <td>{{ $servicio->user->control_number }}</td>
                      <td>{{ $servicio->user->name }}</td>
                      <td>{{ $servicio->user->lastname }}</td>
                      <td>{{ $servicio->adviser }}</td>
                      <td></td>
                      <td>{{ $servicio->created_at }}</td>
                      <td>{{ $servicio->updated_at }}</td>
                      <td>
                        <a href="{{ route('bitacoraservicio.edit',$servicio->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                      </td>
                      <td>
                        <form method="POST" action="{{ route('bitacoraservicio.destroy', $servicio->id)}}">
                        @csrf
                        @method('DELETE')
                         <button class="btn btn-danger btn-sm" type="submit">
                            <i class="fas fa-trash-alt"></i>
                         </button>
                        </form>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection