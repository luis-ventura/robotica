<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Materiales</title>
</head>
<body>
    <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Material</th>
            <th>Creado</th>
            <th>Actualizado</th>
            <th>Observación</th>
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
           @endforeach
          </tr>
        </tbody>
    </table>
</body>
</html>
