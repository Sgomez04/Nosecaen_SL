@extends ('plantilla')

@section('link')
    <!-- Modal library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/theme1/list.css" />
@endsection

@section('nav')
    <a href="{{ BASE_URL }}list?pag=1" class="nav-item nav-link active"><i
            class="fa fa-gears"></i><span>Tareas</span></a>
    @if ($type == 'admin')
        <a href="{{ BASE_URL }}listU?pagU=1" class="nav-item nav-link"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    @else
        <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-users"></i><span>Empleados</span></a>
    @endif
    <a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
    <a href="{{ BASE_URL }}profile?idU={{ $_SESSION['id'] }}" class="nav-item nav-link"><i
            class="fa fa-user"></i><span> Perfil</span></a>
@endsection

@section('cuerpo')
    <div class="container-xl">
        <div class="row table-title">
            <div class="col-sm-6">
                <h2>Gestion <b>Tareas</b></h2>
            </div>
            <div class="col-sm-6">
                @if ($type == 'admin')
                    <a href="<?= BASE_URL ?>form" class="btn btn-success"><i class="material-icons">&#xE147;</i>
                        <span>Añadir nueva Tarea</span></a>
                @endif
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td scope="col"><b> # </b></td>
                        <th scope="col">Tarea</th>
                        <th scope="col">Persona</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Poblacion</th>
                        <th scope="col">C.Postal</th>
                        <th scope="col">Provincia</th>
                        <th scope="col">Estado</th>
                        <th scope="col">F.Creacion</th>
                        <th scope="col">Operario</th>
                        <th scope="col">F.Realizacion</th>
                        <th scope="col">A.Anterior</th>
                        <th scope="col">A.Posterior</th>
                        <th scope="col">Fichero</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (TaskController::getInstance()->listar() as $t)
                        <tr class="list">
                            <td>
                                <a href="<?= BASE_URL ?>form?id={{ $t['id_task'] }}" class="edit"><i
                                        class="material-icons" title="Editar Tarea">&#xE254;</i></a>
                                <br>
                                <br>
                                @if ($type == 'admin')
                                    <a href="<?= BASE_URL ?>cdel?id={{ $t['id_task'] }}" class="delete"><i
                                            class="material-icons" title="Eliminar Tarea">&#xE872;</i></a>
                                @endif
                            </td>
                            <td scope="row"><b>{{ $t['id_task'] }}</b></th>
                            <td>{{ $t['persona'] }} </td>
                            <td>{{ $t['telefono'] }} </td>
                            <td><textarea cols="20" rows="5" readonly>{{ $t['descripcion'] }} </textarea></td>
                            <td>{{ $t['correo'] }}</td>
                            <td>{{ $t['direccion'] }}</td>
                            <td>{{ $t['poblacion'] }}</td>
                            <td>{{ $t['cp'] }}</td>
                            <td>{{ $t['provincia'] }}</td>
                            <td>{{ $t['estado'] }}</td>
                            <td>{{ $t['fecha_creacion'] }}</td>
                            <td>{{ $t['operario'] }}</td>
                            <td>{{ $t['fecha_realizacion'] }}</td>
                            <td><textarea cols="20" rows="5" readonly>{{ $t['anot_anterior'] }}</textarea></td>
                            <td><textarea cols="20" rows="5" readonly>{{ $t['anot_posterior'] }}</textarea></td>
                            @if ($t['fichero'] != '')
                                <td><a href="#">Ver archivo</a></td>
                            @else
                                <td>Sin archivo</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <div class="hint-text">Mostrando <b>{{PAGINATOR}}</b> de
                <b>{{ TaskController::getInstance()->tResultados() }}</b> registros
            </div>

            <b class="pagination"> {{ TaskController::getInstance()->paginacion() }}</b>
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

@section('script')
    <script src="<?= ASSETS_URL ?>js/orderby.js"></script>
@endsection
