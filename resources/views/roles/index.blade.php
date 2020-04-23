@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de Roles y Permisos</h3>
          <div class="card-tools">
           <div class="btn-group">
              <a href="{{ route('users.index') }}" class="btn btn-primary">Users</a>
              <a href="{{ route('permissions.index') }}" class="btn btn-success">Permisos</a>
           </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>                  
              <tr>
                <th style="width: 10px">ID</th>
                <th style="width: 25px">Roles</th>
                <th>Permisos</th>
                <th style="width: 05%">Editar</th>
                <th style="width: 05%">Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
              <tr>
               <td>{{ $role->id }}</td>
               <td>{{ $role->name }}</td>
               <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
               <td>
                <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
               </td>
               <td>
                <form method="POST" action="{{ route('roles.destroy', $role->id)}}">
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
      <a href="{{ route('roles.create') }}" class="btn btn-success">Agregar Role</a>
    </div>
  </div>
</div>
@endsection