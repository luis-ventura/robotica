@extends('layouts.app')

@section('header')
<div class="col-md-12">
    <h2 class="card-title">Bitacora de Visita-Asesoria</h2>
</div><br>
@endsection

@role('administrador|cordinador')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <nav class="navbar navbar-light float-left">
                <form class="form-inline">
                    <!--<input name="date" class="form-control mr-sm-2" type="date" placeholder="Buscar">-->
                    <input name="created_at" class="form-control mr-sm-2" type="text" placeholder="Y-M-D H-M-S">
                    <input name="updated_at" class="form-control mr-sm-2" type="text" placeholder="Y-M-D H-M-S">
                    <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </nav>
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
                  <th style="width: 10%">Hora Entrada</th>
                  <th style="width: 12%">Hora de Salida</th>
                  <th style="width: 5%">Borrar</th>
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
                        <form method="POST" action="{{ route('visits.destroy', $visit->id)}}">
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
          {{ $visits->links() }}
        </div>
      </div>
    </div>
</div>
@endsection
@endrole


@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <nav class="navbar navbar-light float-left">
                <form class="form-inline">
                    <!--<input name="date" class="form-control mr-sm-2" type="date" placeholder="Buscar">-->
                    <input name="created_at" class="form-control mr-sm-2" type="text" placeholder="Y-M-D H-M-S">
                    <input name="updated_at" class="form-control mr-sm-2" type="text" placeholder="Y-M-D H-M-S">
                    <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </nav>
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
                  <th style="width: 10%">Hora Entrada</th>
                  <th style="width: 12%">Hora de Salida</th>
                  <th style="width: 5%">Editar</th>
                  <th style="width: 5%">Borrar</th>
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
                  @if($visit->wasCreatedBy( Auth::user() ))
                      <td>
                        <a href="{{ route('visits.edit',$visit->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                      </td>
                      <td>
                        <form method="POST" action="{{ route('visits.destroy', $visit->id)}}">
                        @csrf
                        @method('DELETE')
                         <button class="btn btn-danger btn-sm" type="submit">
                            <i class="fas fa-trash-alt"></i>
                         </button>
                        </form>
                      </td>
                  @else
                    <td><i class="fas fa-edit"></i></td>
                    <td><i class="fas fa-trash-alt"></i></td>
                  @endif
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          {{ $visits->links() }}
        </div>
      </div>
    </div>
</div>
@endsection
