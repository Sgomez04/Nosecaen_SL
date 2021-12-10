@extends ('plantilla')

@section('link')

<link rel="stylesheet" href="{{ASSETS_URL}}css/{{$_SESSION['theme']}}/listU.css" />

@endsection

@section('nav')
<a href="{{BASE_URL}}list?pag=1" class="nav-item nav-link"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
<a href="{{BASE_URL}}listU?pagU=1" class="nav-item nav-link active"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
<a href="{{BASE_URL}}profile?idU={{$_SESSION['id']}}" class="nav-item nav-link"><i class="fa fa-user"></i><span> Perfil</span></a>
@endsection


@section('cuerpo')
    <div class="container-xl">
        <div class="row table-title">
            <div class="col-sm-6">
                <h2>Gestion <b>Empleados</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="<?= BASE_URL ?>formU" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                    <span>Añadir nuevo Empleado</span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td><b>#</b></td>
                        <th>Empleado</th>
                        <th>Nombre de Usuario</th>
                        <th>Contraseña</th>
                        <th>Tipo de empleado</th>
                        <th>Nombre del empleado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (UserController::getInstance()->listarUsuarios() as $u)
                        <tr class="list">
                            <td>
                                <a href="{{BASE_URL}}formU?idU={{ $u['id_employer'] }}" class="edit"><i
                                        class="material-icons" title="Editar Tarea">&#xE254;</i></a>
                                <br>
                                <br>
                                <a href="{{BASE_URL}}cdelU?idU={{ $u['id_employer'] }}" class="delete"><i
                                        class="material-icons" title="Eliminar Tarea">&#xE872;</i></a>
                            </td>
                            <td><b>{{ $u['id_employer'] }}</b></td>
                            <td>{{ $u['user'] }} </td>
                            <td>{{ $u['passwords'] }} </td>
                            <td>{{ $u['types'] }} </td>
                            <td>{{ $u['names'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <div class="hint-text">Mostrando <b>{{$_SESSION['listU']}}</b> de
                <b>{{ UserController::getInstance()->tResultadosU() }}</b> registros
            </div>
            <b class="pagination"> {{ UserController::getInstance()->paginacionU() }}</b>
        </div>
    </div>
@endsection

@section('script')
<script src="<?= ASSETS_URL ?>js/orderby.js"></script>
@endsection