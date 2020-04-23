@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de Permisos</h3>
            <div class="card-tools">
             <div class="btn-group">
                <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>
                <a href="{{ route('roles.index') }}" class="btn btn-success">Roles</a>
             </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>                  
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Nombre Permiso</th>
                  <th style="width: 10px">Editar</th>
                  <th style="width: 10px">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $permission)
                <tr>
                 <td>{{ $permission->id }}</td>
                 <td>
                   {{ $permission->name }}</a>
                  </td>
                 <td>
                  <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                 </td>
                 <td>
                    <form method="POST" action="{{ route('permissions.destroy', $permission->id)}}">
                        @csrf
                        {!! method_field('PUT') !!}
                        {!! method_field('DELETE') !!}
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
        <a href="{{ route('permissions.create') }}" class="btn btn-success">Agregar Permiso</a>
      </div>
    </div>
</div>
@endsection