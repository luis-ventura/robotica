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
                  <p class="textprofile"><i class="fas fa-user"></i>       <b> Nombres:</b> {{ $users->name }}</p>
                  <p class="textprofile"><i class="fas fa-user"></i>       <b> Apellidos:</b> {{ $users->lastname }} </p>
                  <p class="textprofile"><i class="fas fa-envelope"></i>   <b> Correo Registrado:</b> {{ $users->email }}</p>
                  <p class="textprofile"><i class="fas fa-hashtag"></i>    <b> Numero Control:</b> {{ $users->control_number }}</p>
                  <p class="textprofile"><i class="fas fa-school"></i>     <b> Carrera:</b> {{ $users->career ? $users->career : 'Sin datos' }}  </p>
                  <p class="textprofile"><i class="fas fa-book-reader"></i><b> Estado:</b> {{ $users->activity }} </p>
                  <p class="textprofile"><i class="fas fa-user-clock"></i> <b> Fecha de Creación:</b> {{ $users->created_at }} </p>
                  <p class="textprofile"><i class="fas fa-user-clock"></i> <b> Ultima modificación:</b> {{ $users->updated_at }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
