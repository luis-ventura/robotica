<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitacora Residencia</title>
    <link href="css/pdfResi.css" rel="stylesheet">
</head>
<body>
    <img src="imgpdf/itvh.png" class="itvh" width="100px" height="130px">
    <h1>Bitacora Club de Robotica</h1>
    <h2>Residencia</h2>
    <img src="imgpdf/tec.jpg" class="tec">
    <h3>Enero-Junio</h3>
    <br>
    <table>
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Matricula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Firma</th>
            <th>Creado</th>
            <th>Actualizado</th>
            <th>F.Encargado</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($bitacorasresidencia as $residencia)
            <tr>
                <td>{{ $residencia->date }}</td>
                <td>{{ $residencia->user->control_number }}</td>
                <td>{{ $residencia->user->name }}</td>
                <td>{{ $residencia->user->lastname }}</td>
                <td></td>
                <td>{{ $residencia->created_at }}</td>
                <td>{{ $residencia->updated_at }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>
