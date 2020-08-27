@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane">
                <!-- Post -->
                <div class="post">
                  <h5 style="text-align: center;"><b>Datos del Perfil</b></h5><hr>
                  <img class="img-bordered img-fluid" src="{{ asset('storage/avatar/'.$users->avatar) }}" alt="user image" style=" float: right; ">
                  <p class="textprofile"><b> Nombres:</b> {{ $users->name }}</p>
                  <p class="textprofile"><b> Apellidos:</b> {{ $users->lastname }} </p>
                  <p class="textprofile"><b>Correo Registrado:</b> {{ $users->email }}</p>
                  <p class="textprofile"><b>Numero Control:</b> {{ $users->control_number }}</p>
                  <p class="textprofile"><b>Carrera:</b> {{ $users->career ? $users->career : 'Sin datos' }}  </p>
                  <p class="textprofile"><b>Estado:</b> {{ $users->activity }} </p>
                  <p class="textprofile"><b>Fecha de Creación:</b> {{ $users->created_at }} </p>
                  <p class="textprofile"><b>Ultima modificación:</b> {{ $users->updated_at }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
