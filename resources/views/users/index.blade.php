@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Usuarios</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Rol</th>
                                <th>Correo</th>
                                <th>N°Control</th>
                                <th>Carrera</th>
                                <th>Actividad</th>
                                <th>Usuario Actualizado</th>
                                @role('administrador')
                                <th>Editar</th>
                                <th>Eliminar</th>
                                @endrole
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Rol</th>
                                <th>Correo</th>
                                <th>N° Control</th>
                                <th>Carrera</th>
                                <th>Actividad</th>
                                <th>Usuario Actualizado</th>
                                @role('administrador')
                                <th>Editar</th>
                                <th>Eliminar</th>
                                @endrole
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->roles()->pluck('name')->implode(',') }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->control_number }}</td>
                                <td>{{ $user->career }}</td>
                                <td>{{ $user->activity }}</td>
                                <td>{{ $user->updated_at }}</td>
                                @role('administrador')
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-user-edit"></i></a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('users.destroy', $user->id)}}">
                                        @csrf
                                        @method('DELETE')
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
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $users->appends($_GET)->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection
