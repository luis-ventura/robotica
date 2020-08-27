<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitacora Visita-Asesoria</title>
    <link href="css/pdfResi.css" rel="stylesheet">
</head>
<body>
    <img src="imgpdf/itvh.png" class="itvh" width="100px" height="130px">
    <h1>Bitacora Club de Robotica</h1>
    <h2>Lista de Materiales</h2>
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
                <th>Hora de Entrada</th>
                <th>Hora de Salida</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($visits as $visit)
            <tr>
                <td>{{ $visit->id }}</td>
                <td>{{ $visit->date }}</td>
                <td>{{ $visit->user->control_number }}</td>
                <td>{{ $visit->user->name }}</td>
                <td>{{ $visit->user->lastname }}</td>
                <td>{{ $visit->assessor }}</td>
                <td>{{ $visit->created_at }}</td>
                <td>{{ $visit->updated_at }}</td>
                </tr>
          @endforeach
        </tbody>
    </table>
</body>
</html>
