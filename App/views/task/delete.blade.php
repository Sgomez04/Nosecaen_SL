@extends ('plantilla')

@section('link')
    <link rel="stylesheet" href="{{ ASSETS_URL }}css/confirm-delete.css" />

    <!-- Latest minified bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest minified bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


@endsection

@section('nav')
    <a href="{{ BASE_URL }}list?pag=1" class="nav-item nav-link active"><i
            class="fa fa-gears"></i><span>Tareas</span></a>
    @if ($type == 'admin')
        <a href="{{ BASE_URL }}listU?pagU=1" class="nav-item nav-link"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    @else
        <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Empleados</span></a>
    @endif
    <a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
    <a href="{{ BASE_URL }}profile?idU={{ $_SESSION['id'] }}" class="nav-item nav-link"><i
            class="fa fa-user"></i><span> Perfil</span></a>

@endsection

@section('cuerpo')

    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Eliminacion de la tarea</h4>
                <a href="list" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
            </div>
            <div class="modal-body">
                <p>¿Esta segur@ de que desea eliminar la tarea? Esta accion no puede deshacerse</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="{{ BASE_URL }}list" class="bton btn-secondary" data-dismiss="modal">Cancelar</a>
                {{-- <a href="{{BASE_URL}}del?id={{ $id }}" class="bton btn-danger">Eliminar</a> --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Launch demo modal
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Acceso Denegado</h4>
                    <a href="list" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
                </div>
                <div class="modal-body">
                    <p>No puedes acceder a este apartado hasta que te hayas accedido con tu cuenta de empleado</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="{{ BASE_URL }}list" class="bton btn-secondary" data-dismiss="modal">Cerrar</a>
                </div>
            </div>
        </div>
    </div>

@endsection
