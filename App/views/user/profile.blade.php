@extends ('plantilla')

@section('link')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/profile.css" />

@endsection

@section('nav')
    <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Inicio</span></a>
    <a href="<?= BASE_URL ?>list?pag=1" class="nav-item nav-link active"><i class="fa fa-gears"></i><span>Tareas</span></a>
    @if ($type == 'admin')
        <a href="<?= BASE_URL ?>listU?pagU=1" class="nav-item nav-link"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    @else
        <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Empleados</span></a>
    @endif
    <a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
@endsection

@section('cuerpo')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="https://www.svgimages.com/svg-image/s5/man-passportsize-silhouette-icon-256x256.png"
                        alt="stack photo" class="img">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                    <div class="container" style="border-bottom:1px solid black">
                        <h2>{{ $nombre }}</h2>
                    </div>
                    <hr>
                    <ul class="container details">
                        <li>
                            <p><span class="glyphicon glyphicon-user" style="width:50px;"></span>{{ $nombre }}</p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-tag" style="width:50px;"></span>{{ $usuario }}</p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-briefcase" style="width:50px;"></span>{{ $type }}
                            </p>
                        </li>
                    </ul>
                    <p><a href="#">Editar Datos</p></a>
                </div>
            </div>
        </div>
    @endsection
