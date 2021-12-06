@extends ('plantilla')

@section('link')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/index.css" />
@endsection

@section('nav')
<a href="<?= BASE_URL ?>" class="nav-item nav-link active"><i
    class="fa fa-users"></i><span>Inicio</span></a>
<a href="<?= BASE_URL ?>list?pag=1" class="nav-item nav-link"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
<a href="<?= BASE_URL ?>listU?pagU=1" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
@endsection

@section('cuerpo')

<div class="bgded overlay" style="background-image:url('http://localhost/PHP/NoSeCaenSL/Assets/img/index.jpg');">
    <div id="pageintro" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <article>
        <h3 class="heading">NoSeCaen S.L</h3>
        <p>Aplicación para empleados. Usar con responsabilidad y notificar en caso de encontrar
            errores.</p>
        <p>¡Por una buena gestión!</p> 
        <footer><a class="btn" href="<?php BASE_URL ?>login">Acceder</a></footer>
      </article>
      <!-- ################################################################################################ -->
    </div>
  </div>

@endsection