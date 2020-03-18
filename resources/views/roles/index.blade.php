@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Roles Disponibles</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Rol</th>
                  <th>Ruta</th>
                  <th>Rol Creado</th>
                  <th>Rol Actualizado</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                <tr>
                  <td>{{ $role->id }}</td>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->guard_name }}</td>
                  <td>{{ $role->created_at }}</td>
                  <td>{{ $role->updated_at }}</td>
                  <td>
                    <form method="POST" action="{{ route('roles.destroy', $role->id)}}">
                        @csrf
                        {!! method_field('PUT') !!}
                        {!! method_field('DELETE') !!}
                      <button class="btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-user-minus"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
        </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
@endsection