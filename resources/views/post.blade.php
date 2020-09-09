<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Robotica ITVH</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mystyle.css')}}" rel="stylesheet">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    </head>
    <body>
    @extends('layouts.navbar')

    @section('principal')
        <hr>
    @endsection

    @section('contenido')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 mx-auto">
                <h1 style="text-align: center;"> {{ $noticia['title'] }}</h1>
                <img src="{{ asset('/storage/notice_images/'.$noticia['image_url']) }}" class="img-fluid" style="display:block; margin:auto;"><br><br>
                <p>{!! $noticia['content']!!}</p>
            </div>
        </div>
    </div>

    <hr>
    @endsection
    </body>
</html>