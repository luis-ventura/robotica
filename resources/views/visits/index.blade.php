@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Bitacora de Visita-Asesoria</h3>
            <div class="card-tools">
             <div class="btn-group">
                @can('generar_pdf')
                <a href="{{ route('visita.pdf') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generar PDF
                </a>
                @endcan
                <a href="{{ route('visits.create') }}" class="btn btn-success">Añadir Registro</a>
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
                  <th style="width: 10%">Creado</th>
                  <th style="width: 10%">Actualizado</th>
                  <th style="width: 5%">Editar</th>
                  @can('eliminar_visitante')
                    <th style="width: 5%">Borrar</th>
                  @endcan
                </tr>
              </thead>
              <tbody>
                  @foreach ($visits as $visit)
                  <tr>
                      <td>{{ $visit->id }}</td>
                      <td>{{ $visit->date }}</td>
                      <td>{{ $visit->user->control_number }}</td>
                      <td>{{ $visit->user->name }}</td>
                      <td>{{ $visit->user->lastname }}</td>
                      <td>{{ $visit->assessor }}</td>
                      <td>{{ $visit->created_at }}</td>
                      <td>{{ $visit->updated_at }}</td>
                      <td>
                        <a href="{{ route('visits.edit',$visit->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                      </td>
                      @can('eliminar_visitante')
                      <td>
                        <form method="POST" action="{{ route('visits.destroy', $visit->id)}}">
                        @csrf
                        @method('DELETE')
                         <button class="btn btn-danger btn-sm" type="submit">
                            <i class="fas fa-trash-alt"></i>
                         </button>
                        </form>
                      </td>
                      @endcan
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
