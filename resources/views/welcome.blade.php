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
            <img src="img/fondo2.jpg" class="img-fluid" id="fondo" width="1376" height="500">
            <hr>     
        @endsection
        
        @section('contenido')
        <!-- Main Content -->
        <div class="container">
            <div class="col-lg-10 col-md-12 mx-auto">
                <div class="row">
                    @foreach($noticias as $noticia)
                    <div class="col-md-4">
                        <img class="img-thumbnail mt-5" width="200%" src="{{ asset('/storage/notice_images/'.$noticia['image_url']) }}" alt="post_image">
                    </div> 
                    <div class="col-lg-8">
                        <div class="post-preview"><br><br><br><br><br><br><br>
                            <a href="/welcome/{{$noticia['id']}}">
                            <h2 class="post-title">
                            {{ $noticia->title }}
                            </h2>
                            <p class="post-subtitle">
                            {!! getShorterString($noticia['content'], 200) !!}
                            </p>
                        </a>
                        <p class="post-meta">Creado por
                            <a href="#">{{ $noticia->user['name'] }}</a>
                            {{ $noticia->created_at }}</p>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
                {{ $noticias->links() }}
            </div>
        </div>
        <hr>    
        
        <footer>
            Derechos Reservados ITVH 2020
        </footer> 
        @endsection
    </body>
</html>
