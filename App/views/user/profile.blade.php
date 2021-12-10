@extends ('plantilla')

@section('link')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/{{$_SESSION['theme']}}/profile.css" />

@endsection

@section('nav')
    <a href="{{ BASE_URL }}list?pag=1" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>
    @if ($type == 'admin')
        <a href="{{ BASE_URL }}listU?pagU=1" class="nav-item nav-link"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    @else
        <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-users"></i><span>Empleados</span></a>
    @endif
    <a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
    <a href="{{ BASE_URL }}profile?idU={{ $_SESSION['id'] }}" class="nav-item nav-link active"><i
            class="fa fa-user"></i><span> Perfil</span></a>

@endsection

@section('cuerpo')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="{{ ASSETS_URL }}img/logo2.png" alt="stack photo" class="img">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                    <div class="container" style="border-bottom:1px solid black">
                        <h2>{{ $nombre }}</h2>
                    </div>
                    <hr>
                    <br>
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
                    <br>
                    <a aria-label='Thanks' class='h-button centered bton' data-text='Editar datos'
                        href="{{ BASE_URL }}edit-profile?idU={{ $_REQUEST['idU'] }}&eprofile=1">
                        <span>C</span>
                        <span>l</span>
                        <span>i</span>
                        <span>c</span>
                        <span>k</span>
                        <span></span>
                        <span>A</span>
                        <span>q</span>
                        <span>u</span>
                        <span>i</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- MODAL --}}
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-confirm">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <h4 class="modal-title w-100">Acceso Denegado</h4>
                    </div>
                    <div class="modal-body">
                        <br>
                        <p>No tienes los permisos suficientes para visualizar esta seccion</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <a href="#" class="bton btn-danger" data-dismiss="modal">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
