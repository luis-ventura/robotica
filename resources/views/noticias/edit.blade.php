@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">Actualizar Evento</h2>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" action="{{ route('noticias.update',$noticias->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Ingrese un titulo" value="{{ $noticias->title }}">
                </div>
                <label for="image">Seleccionar Imagen</label>
                <input type="file" name="image_url" class="form-control-file" id="profile-img" value="{{ $noticias->image_url }}">
                <div class="row">
                    <img src="{{ asset('/storage/notice_images/'.$noticias['image_url']) }}" id="profile-img-tag" class="img-thumbnail mx-auto" alt="{{ $noticias->image_url }}" width="250" >
                </div>
                <div class="form-group">
                    <label for="content">Insertar Contenido</label>
                    <textarea name="content" id="editor">{{ $noticias->content }}</textarea>
                </div>
            
                <div class="form-group pt-2">
                    <input class="btn btn-success" type="submit" value="Guardar">
                    <a href="{{ route('noticias.index') }}" class="btn btn-danger">Regresar</a>
                </div>
            </form>          
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    var editor = CKEDITOR.replace( 'editor' );
    CKFinder.setupCKEditor(editor);
</script>
@endsection
