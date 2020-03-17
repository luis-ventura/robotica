<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Robotic Notes</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mystyle.css')}}" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.navbar')

        @section('content')
        
        <img src="img/fondo.jpg" class="img-fluid">

        <footer>
            Derechos Reservados ITVH 2020
        </footer>            
        @endsection
    </body>
</html>
