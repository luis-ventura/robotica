@extends('layouts.app')

@section('header')
<div class="col-md-12">
    <h2 class="card-title">Bitacora de Residencia</h2>
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
                <a href="{{ route('residencia.pdf') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generar PDF
                </a>
                @endcan
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
                  <th style="width: 10%">Hora Entrada</th>
                  <th style="width: 10%">Hora de Salida</th>
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
                      <td>{{ $residencia->created_at }}</td>
                      <td>{{ $residencia->updated_at }}</td>
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
          {{ $bitacorasresidencia->links() }}
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
                <a href="{{ route('residencia.pdf') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generar PDF
                </a>
                @endcan
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
                  <th style="width: 10%">Hora Entrada</th>
                  <th style="width: 10%">Hora de Salida</th>
                  <th style="width: 5%">Editar</th>
                  <th style="width: 5%">Borrar</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($bitacorasresidencia as $residencia)
                  @if($residencia->wasCreatedBy( Auth::user() ))
                  <tr>
                      <td>{{ $residencia->id }}</td>
                      <td>{{ $residencia->date }}</td>
                      <td>{{ $residencia->user->control_number }}</td>
                      <td>{{ $residencia->user->name }}</td>
                      <td>{{ $residencia->user->lastname }}</td>
                      <td>{{ $residencia->created_at }}</td>
                      <td>{{ $residencia->updated_at }}</td>
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
                  @endif
                  @endforeach
              </tbody>
            </table>
          </div>
          {{ $bitacorasresidencia->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection
