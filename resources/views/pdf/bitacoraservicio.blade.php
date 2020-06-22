<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitacora Servicio Social</title>
    <link href="css/pdfResi.css" rel="stylesheet">
</head>
<body>
    <img src="imgpdf/itvh.png" class="itvh" width="100px" height="130px">
    <h1>Bitacora Club de Robotica</h1>
    <h2>Servicio Social</h2>
    <img src="imgpdf/tec.jpg" class="tec">
    <h3>Enero-Junio</h3>
    <br>
    <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Asesor</th>
            <th>Firma</th>
            <th>Creado</th>
            <th>Actualizado</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($bitacoraservicio as $servicio)
            <tr>
                <td>{{ $servicio->id }}</td>
                <td>{{ $servicio->date }}</td>
                <td>{{ $servicio->user->control_number }}</td>
                <td>{{ $servicio->user->name }}</td>
                <td>{{ $servicio->user->lastname }}</td>
                <td>{{ $servicio->adviser }}</td>
                <td></td>
                <td>{{ $servicio->created_at }}</td>
                <td>{{ $servicio->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>
