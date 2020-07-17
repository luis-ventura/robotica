@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
            <h3>Titulo:     {{ $posts->title }}<h3>
            <p>Descripción: {{ $posts->description }}</p>
            <p>Fuente:      {{ $posts->url }}</p>
            <p>Creado:      {{ $posts->created_at->diffForHumans() }}</p>

            <div class="row">
                <div class="col-md-12">
                    @if(Auth::guest())
                        Inicia sesión por favor!
                    @else
                    <form action="{{ route('create_comment',['posts' => $posts->id ]) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="comment"></label>
                            <textarea rows="5" name="comment" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Crear Comentario</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @foreach($posts->comments as $comment)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well">
                                {{ $comment->text }} - {{ $comment->user['name'] }} - {{ $comment->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!--<a class="btn btn-warning" href="{{ route('posts.index') }}">Regresar</a>-->
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
