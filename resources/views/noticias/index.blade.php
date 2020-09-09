@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">Lista de Eventos Publicados</h2>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered table-responsive" width="100%">
              <thead>
                <tr>
                  <th style="width: 5%">ID</th>
                  <th style="width: 15%">Titulo</th>
                  <th style="width: 50%">Contenido</th>
                  <th style="width: 10%">Imagen</th>
                  <th style="width: 10%">Usuario</th>
                  <th style="width: 10%">Editar</th>
                  <th style="width: 10%">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                @foreach($noticias as $noticia)
                <tr>
                  <td>{{ $noticia->id }}</td>
                  <td>{{ $noticia->title }}</td>
                  <td>{!! getShorterString($noticia['content'], 180) !!}</td>
                  <td><img src="{{ asset('/storage/notice_images/'.$noticia['image_url']) }}" alt="{{ $noticia['image_url'] }}" width="100"></td>
                  <td>{{ str_replace(array('[' ,']' ,'"'),' ', $noticia->user()->pluck('name')) }}</td>
                  <td>
                    <a href="{{ route('noticias.edit',$noticia->id) }}"><i class="fa fa-edit"></i></a>
                  </td>
                  <td>
                    <a href="#"  data-toggle="modal" data-target="#deleteModal" data-noticiaid="{{ $noticia->id }}"><i class="fas fa-trash-alt"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>


<!-- delete Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de que quieres eliminar esto?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">Seleccione "eliminar" si realmente desea eliminar esta publicación.</div>
        <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
        @if(empty($noticia))
            unset($noticia);
        @else
        <form method="POST" action="{{ route('noticias.destroy', $noticia->id) }}">
            @method('DELETE')
            @csrf
            <input type="hidden" id="noticia_id" name="noticia_id" value="">
            <a style="color: white;" class="btn btn-danger" onclick="$(this).closest('form').submit();">Eliminar</a>
        </form>
        @endif
        </div>
    </div>
  </div>
@endsection

@section('js_post_page')
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
            var button     = $(event.relatedTarget)
            var noticia_id = button.data('noticiaid')

            var modal = $(this)
            modal.find('.modal-footer #noticia_id').val(noticia_id)
        })
</script>
@endsection