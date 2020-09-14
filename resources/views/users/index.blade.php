@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered data-table compact">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Rol</th>
                <th>Correo</th>
                <th>N°Control</th>
                <th>Carrera</th>
                <th>Actividad</th>
                <th>Usuario Actualizado</th>
                @role('administrador')
                <th>Opciones</th>
                @endrole
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

@push('scripts')
    <script>
        $(function () {
            var table = $('.data-table').DataTable({
                proccessing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns:[
                    { data: 'id',             name: 'id' },
                    { data: 'name',           name: 'name' },
                    { data: 'lastname',       name: 'lastname' },
                    { data: 'rol',            name: 'rol' },
                    { data: 'email',          name: 'email' },
                    { data: 'control_number', name: 'control_number' },
                    { data: 'career',         name: 'career' },
                    { data: 'activity',       name: 'activity' },
                    { data: 'updated_at',     name: 'updated_at'},
                    { data: 'action',         name: 'action', orderable: false, searchable: false },
                ],
                "language":{
                    "info": "_TOTAL_ Registros",
                    "search": "Buscar",
                    "paginate": {
                        "next": "Siquiente",
                        "previous": "Anterior"
                    },
                    "lengthMenu": 'Mostrar <select>'+
                                  '<option value="10">10</option>'+
                                  '<option value="30">30</option>'+
                                  '<option value="-1">Todos</option>'+
                                  '</select> Registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "zeroRecords": "No hay coincidencias",
                    "infoEmpty": "",
                    "infoFiltered": ""
                }
            })
        })
    </script>
@endpush

@endsection


