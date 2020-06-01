@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bitacora de Residencia</h3>
            <div class="card-tools">
             <div class="btn-group">
                <a href="{{ route('residencia.pdf') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generar PDF
                </a>
                <a href="{{ route('bitacorasresidencia.create') }}" class="btn btn-success">Añadir Registro</a>
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
                  <th style="width: 10%">Firma</th>
                  <th style="width: 10%">Creado</th>
                  <th style="width: 10%">Actualizado</th>
                  <th style="width: 10%">F.Encargado</th>
                  <th style="width: 5%">Editar</th>
                  <th style="width: 5%">Borrar</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($bitacorasresidencia as $residencia)
                  <tr>
                      <td>{{ $residencia->id }}</td>
                      <td>{{ $residencia->date }}</td>
                      <td>{{ $residencia->user->control_number }}</td>
                      <td>{{ $residencia->user->name }}</td>
                      <td>{{ $residencia->user->lastname }}</td>
                      <td></td>
                      <td>{{ $residencia->created_at }}</td>
                      <td>{{ $residencia->updated_at }}</td>
                      <td></td>
                      <td>
                        <a href="{{ route('bitacorasresidencia.edit',$residencia->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                      </td>
                      <td>
                        <form method="POST" action="{{ route('bitacorasresidencia.destroy', $residencia->id)}}">
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
