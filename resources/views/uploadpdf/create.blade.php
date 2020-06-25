@extends('layouts.app')

@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Subiendo PDF</h3>
    </div>
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ route('uploadpdf.store')}}" enctype="multipart/form-data">
    @csrf
      <div class="card-body">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Subir PDF</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="upload" id="upload" value="{{ old('upload') }}">
            </div>
            @error('upload')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
         </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a class="btn btn-warning" href="{{ route('uploadpdf.index') }}">Cancelar</a>
      </div>
      <!-- /.card-footer -->
    </form>
</div>
@endsection
