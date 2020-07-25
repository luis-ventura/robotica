@extends('layouts.app')

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="btn btn-primary" href="">Lista de Preguntas</a></li>
                <li class="nav-item"><a class="btn btn-success"  href="{{ route('posts.create') }}">Agregar Pregunta</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                  <!-- Post -->
                  <div class="post">
                        @foreach($posts as $post)
                        <h3>
                            <a href="{{ route('posts.show',['post' => $post->id]) }}">{{ $post->title }}</a>

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
                        <h3>
                        <p>{{ $post->url }}</p>
                        <p>{{ $post->created_at->diffForHumans() }} creado por <b>{{ $post->user['name'] }}</b></p>
                        <hr>
                        @endforeach
                  </div>
                {{ $posts->links() }}
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
