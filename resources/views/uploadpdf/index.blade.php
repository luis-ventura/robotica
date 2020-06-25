@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Lista de PDF Subidos</h3>
            <div class="card-tools">
                <div class="btn-group">
                   <a href="{{ route('uploadpdf.create') }}" class="btn btn-success">Subir PDF</a>
                </div>
            </div>


          </div>
        </div>
      <div class="col-12">
        <table class="table table-hover">
			<thead>
			  <tr>
				<th>Usuario</th>
				<th>Archivo</th>
			  </tr>
			</thead>
			<tbody>
			  @foreach($pdfs as $pdf)
			  <tr>
				<td>{{$pdf->user->full_name}}</td>
				<td><a data-fancybox="gallery" href="{{route('uploadpdf.show', $pdf)}}">{{asset($pdf->upload)}}</a></td>
			  </tr>
			  @endforeach
			</tbody>
		  </table>
		  {{$pdfs->links()}}
      </div>
    </div>
</div>
@endsection
