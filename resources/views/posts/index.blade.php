@extends('layouts.app')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Lista de Preguntas y Respuestas</h3>

      <div class="card-tools">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="btn btn-success"  href="{{ route('posts.create') }}">Agregar Pregunta</a></li>
          </ul>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-12">
              <h4>Actividad Reciente</h4><br>
                <div class="post">
                @foreach($posts as $post)
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('storage/avatar/'.$post->user['avatar']) }}" alt="user image">
                    <span class="username">
                      <a href="{{ route('posts.show',['post' => $post->id]) }}">{{ $post->user['name'] }}</a>
                    </span>
                    <span class="description">Publicado {{ $post->created_at->diffForHumans() }}</span>
                  </div>
                  <!-- /.user-block -->
                  <h3>
                    Tema: <a href="{{ route('posts.show',['post' => $post->id]) }}">{{ $post->title }}</a>
                    @if($post->wasCreatedBy( Auth::user() ))
                        <span class="pull-right" style="float: right;">
                            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm" ><i class="fas fa-edit"></i></a>
                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </span>
                    @endif
                  </h3>
                  <br>
                  <hr>
                @endforeach
                </div>
                {{ $posts->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection
