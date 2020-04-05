@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de Registros de Usuarios</h3>
            <div class="card-tools">
              <form class="form-inline">
                @csrf
              <div class="input-group input-group-sm" style="width: 300px;">
                <select name="tipo" class="form-control float-right" id="option">
                  <option>Buscar por tipo</option>
                  <option>name</option>
                  <option>lastname</option>
                  <option>email</option>
                  <option>control_number</option>
                  <option>career</option>
                  <option>activity</option>
                  <option>updated_at</option>
                </select>
                <input name="buscarpor" type="text" class="form-control float-right" placeholder="Buscar...">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Rol</th>
                  <th>Correo</th>
                  <th>Numero Control</th>
                  <th>Carrera</th>
                  <th>Actividad</th>
                  <th>Usuario Actualizado</th>
                  @role('administrator')
                  <th>Eliminar</th>
                  @endrole
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>
                    <a href="{{ route('users.show', $user->id) }}">
                    {{ $user->name }}</a>
                  </td>
                  <td>{{ $user->lastname ? $user->lastname : 'Sin datos'}}</td>
                  <td>{{ $user->roles()->pluck('name')->implode('') }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->control_number ? $user->control_number : 'Sin registrar'}}</td>
                  <td>{{ $user->career ? $user->career : 'Sin resgistrar' }}</td>
                  <td>{{ $user->activity ? $user->activity : 'Sin actividad' }}</td>
                  <td>{{ $user->updated_at }}</td>
                  @role('administrator')
                  <td>
                    <form method="POST" action="{{ route('users.destroy', $user->id)}}">
                        @csrf
                        {!! method_field('PUT') !!}
                        {!! method_field('DELETE') !!}
                      <button class="btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-user-minus"></i>
                      </button>
                    </form>
                  </td>
                  @endrole
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              {{ $users->appends($_GET)->links() }}
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </div>
<!-- /.container-fluid -->
@endsection