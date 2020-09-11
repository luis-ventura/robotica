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
                 @can('generar_pdf')
                 <a href="{{ route('materiales.pdf') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generar PDF
                 </a>
                 @endcan
                <a href="{{ route('materials.create') }}" class="btn btn-success">Añadir Registro</a>
             </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 5%">ID</th>
                  <th style="width: 10%">Fecha</th>
                  <th style="width: 8%">Matricula</th>
                  <th style="width: 10%">Nombre</th>
                  <th style="width: 10%">Apellido</th>
                  <th style="width: 10%">Material</th>
                  <th style="width: 10%">Hora Entrada</th>
                  <th style="width: 10%">Hora de Salida</th>
                  <th style="width: 8%">Observación</th>
                  <th style="width: 5%">Editar</th>
                  <th style="width: 5%">Borrar</th>
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
                 @if($material->wasCreatedBy( Auth::user() ))
                 <td>
                    <a href="{{ route('materials.edit',$material->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                 </td>
                 <td>
                   <form method="POST" action="{{ route('materials.destroy', $material->id)}}">
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
        </div>
      </div>
    </div>
</div>
@endsection
