@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
       <h2 class="card-title">Bienvenido al Club de Robotica</h2>
    </div>
    <div class="card-body">
     <div class="imgtext">
       <img src="{{ asset('img/robot.jpeg') }}" class="img-fluid" id="robot">
       <p class="hometext"><b>Nombre:</b> {{ Auth::user()->name }}</p>
       <p class="hometext"><b>Apellidos:</b> {{ Auth::user()->lastname }}</p>
       <p class="hometext"><b>Correo:</b> {{ Auth::user()->email }} </p>
       <p class="hometext"><b>N° Control:</b> {{ Auth::user()->control_number }} </p>
       <p class="hometext"><b>Ultima Modificación:</b> {{ Auth::user()->updated_at }}</p>
     </div>
     <br><br>
     <h2>Tres Leyes de la Robotica de Isaac Asimov</h2>

     <p>
        Los robots positrónicos de Asimov están programados para cumplir las Tres Leyes de
        la Robótica, enunciadas por primera vez en Círculo vicioso, un relato publicado en 1942:
     </p>

     <ul>
         <li>
            Un robot no puede dañar a un ser humano ni, por inacción, permitir que un ser humano sufra daño.
         </li>
         <li>
            Un robot debe cumplir las órdenes de los seres humanos, excepto si dichas órdenes entran en conflicto con la Primera Ley.
         </li>
         <li>
            Un robot debe proteger su propia existencia en la medida en que ello no entre en conflicto con la Primera o la Segunda Ley.
         </li>
     </ul>

    </div>
</div>
@endsection
