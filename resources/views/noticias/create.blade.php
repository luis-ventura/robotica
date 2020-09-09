@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">Lista de Eventos</h2>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" action="{{ route('noticias.store') }}" enctype="multipart/form-data">
                @csrf
            
                <div class="form-group">
                    <label for="title">Titulo</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Ingrese un titulo" value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label for="image">Seleccionar Imagen</label>
                    <input type="file" name="image_url" class="form-control-file" id="image">
                </div>
                <div class="form-group">
                    <label for="content">Insertar Contenido</label>
                    <textarea name="content" id="editor">{{ old('content') }}</textarea>
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
