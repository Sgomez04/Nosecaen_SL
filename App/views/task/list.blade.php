@extends ('plantilla')

@section('cuerpo')
    <h1 class="page-header">Tareas ({{ TaskController::getInstance()->tResultados() }} registradas) </h1>

    {{-- Boton para crear una nueva tarea --}}
    @if ($type == 'admin')
        <div class="well well-sm text-right">
            <a class="btn btn-primary" href="<?= BASE_URL ?>form">Nueva Tarea</a>
        </div>
    @endif

    {{-- Boton para hacer logout --}}
    <div class="well well-sm text-right">
        <a class="btn btn-primary" href="<?= BASE_URL ?>logout">Logout</a>
    </div>

    <div class="row">
        <div class="col-md-12">

            <table class="table table-striped">
                <thead class="thead-dark" style="text-align:center">
                    <tr>
                        <th scope="col" style="width:60;">Tarea</th>
                        <th scope="col" style="width:60px;">Persona</th>
                        <th scope="col" style="width:60px;">Telefono</th>
                        <th scope="col" style="width:60px;">Descripcion</th>
                        <th scope="col" style="width:60px;">Correo</th>
                        <th scope="col" style="width:60px;">Direccion</th>
                        <th scope="col" style="width:60px;">Poblacion</th>
                        <th scope="col" style="width:60px;">C.Postal</th>
                        <th scope="col" style="width:60px;">Provincia</th>
                        <th scope="col" style="width:60px;">Estado</th>
                        <th scope="col" style="width:60px;">F.Creacion</th>
                        <th scope="col" style="width:60px;">Operario</th>
                        <th scope="col" style="width:60px;">F.Realizacion</th>
                        <th scope="col" style="width:60px;">A.Anterior</th>
                        <th scope="col" style="width:60px;">A.Posterior</th>
                        <th scope="col" colspan=2 style="width:60px;"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach (TaskController::getInstance()->listar() as $t)
                        <tr>
                            <th scope="row"><?php echo $t['id_task']; ?></th>
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
                            <td>
                                <!-- <a class="btn btn-outline-secondary btn-lg" href="?c=task&a=edit&id=<?php echo $t['id_task']; ?>">Editar</a> -->
                                <a class="btn btn-outline-secondary btn-lg"
                                    href="<?= BASE_URL ?>form?id={{ $t['id_task'] }}">Editar</a>
                            </td>
                            @if ($type == 'admin')
                                <td>
                                    <a class="btn btn-outline-secondary btn-lg"
                                        href="<?= BASE_URL ?>cdel?id={{ $t['id_task'] }}">Eliminar</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div id="paginas">
        {{ TaskController::getInstance()->paginacion() }}
    </div>
@endsection
