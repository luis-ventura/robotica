@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            <div class="post">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="{{ asset('avatar/'.$posts->user['avatar']) }}" alt="user image">
                <span class="username">
                  <a href="#">{{ $posts->user['name'] }}</a>
                </span>
                <span class="description">Creado: {{ $posts->created_at->diffForHumans() }}</span>
              </div>
              <!-- /.user-block -->
              <p>{{ $posts->description }}</p>

              <div class="row">
                <div class="col-md-12">
                    @if(Auth::guest())
                        Inicia sesión por favor!
                    @else
                    <form action="{{ route('create_comment',['posts' => $posts->id ]) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="comment"></label>
                            <textarea rows="2" name="comment" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Crear Comentario</button>
                            <a class="btn btn-warning" href="{{ route('posts.index') }}">Regresar</a>
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
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{ asset('avatar/'.$comment->user['avatar']) }}" alt="user image">
                                <span class="username">
                                    <a href="#">{{ $comment->user['name'] }}</a>
                                </span>
                                <span class="description"> Creado: {{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                              <span class="description"> Comentario: {{ $comment->text }}</span>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
              </div>

            </div>
            <!-- /.post -->
          </div>
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
@endsection