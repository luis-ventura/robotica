@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de PDF Subidos</h3>
          <div class="card-tools">
           <div class="btn-group">
            <a href="{{ route('uploadpdf.create') }}" class="btn btn-success">Subir PDF</a>
           </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Usuario</th>
                <th>Archivo</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pdfs as $pdf)
              <tr>
               <td>{{ $pdf->user->full_name }}</td>
               <td><a href="{{route('uploadpdf.show', $pdf)}}">{{asset($pdf->upload)}}</a></td>
               <td>
                  <form method="POST" action="{{ route('uploadpdf.destroy', $pdf->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              {{ $pdfs->appends($_GET)->links() }}
            </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
