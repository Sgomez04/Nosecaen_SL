@extends ('plantilla')

@section('cuerpo')
    <h1 class="page-header">Usuarios ({{ UserController::getInstance()->tResultadosU() }} registradas) </h1>

    {{-- Boton para crear una nueva tarea --}}

    <div class="well well-sm text-right">
        <a class="btn btn-primary" href="<?= BASE_URL ?>formU">Nuevo Usuario</a>
    </div>

    {{-- Boton para hacer logout --}}
    <div class="well well-sm text-right">
        <a class="btn btn-primary" href="<?= BASE_URL ?>logout">Logout</a>
    </div>

    <div class="row">
        <div class="col-md-12">

            <table class="table table-striped">
                <thead class="thead-dark" style="text-align:center">
                    <tr>
                        <th scope="col" style="width:60;">Empleado</th>
                        <th scope="col" colspan=2 style="width:60px;">Nombre de Usuario</th>
                        <th scope="col" style="width:60px;">Contraseña</th>
                        <th scope="col" colspan=2 style="width:60px;">Tipo de empleado</th>
                        <th scope="col" colspan=2 style="width:60px;">Nombre del empleado</th>
                        <th scope="col" colspan=2 style="width:60px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (UserController::getInstance()->listarUsuarios() as $u)
                        <tr>
                            <th scope="row">{{ $u['id_employer'] }}</th>
                            <td colspan=2>{{ $u['user'] }} </td>
                            <td>{{ $u['passwords'] }} </td>
                            <td colspan=2>{{ $u['types'] }} </td>
                            <td colspan=2>{{ $u['names'] }}</td>
                            <td>
                                <a class="btn btn-outline-secondary btn-lg"
                                    href="<?= BASE_URL ?>formU?idU={{ $u['id_employer'] }}">Editar</a>
                            </td>

                            <td>
                                <a class="btn btn-outline-secondary btn-lg"
                                    href="<?= BASE_URL ?>cdelU?idU={{ $u['id_employer'] }}">Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="paginas">
        {{ UserController::getInstance()->paginacionU() }}
    </div>
@endsection
