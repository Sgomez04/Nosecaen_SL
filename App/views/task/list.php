<h1 class="page-header">Tareas</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=task&a=Crud">Nueva Tarea</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Tarea</th>
            <th style="width:60px;">Persona</th>
            <th style="width:60px;">Telefono</th>
            <th style="width:60px;">Descripcion</th>
            <th style="width:60px;">Correo</th>
            <th style="width:60px;">Direccion</th>
            <th style="width:60px;">Poblacion</th>
            <th style="width:60px;">C.Postal</th>
            <th style="width:60px;">Estado</th>
            <th style="width:60px;">F.Creacion</th>
            <th style="width:60px;">Operario</th>
            <th style="width:60px;">F.Realizacion</th>
            <th style="width:60px;">A.Anterior</th>
            <th style="width:60px;">A.Posterior</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->model->listaTareas() as $t) : ?>
            <tr>
                <td><?php echo $t['id_task']; ?></td>
                <td><?php echo $t['persona']; ?></td>
                <td><?php echo $t['telefono']; ?></td>
                <td><?php echo $t['descripcion']; ?></td>
                <td><?php echo $t['correo']; ?></td>
                <td><?php echo $t['direccion']; ?></td>
                <td><?php echo $t['poblacion']; ?></td>
                <td><?php echo $t['cp']; ?></td>
                <td><?php echo $t['provincia']; ?></td>
                <td><?php echo $t['estado']; ?></td>
                <td><?php echo $t['fecha_creacion']; ?></td>
                <td><?php echo $t['operario']; ?></td>
                <td><?php echo $t['fecha_realizacion']; ?></td>
                <td><?php echo $t['anot_anterior']; ?></td>
                <td><?php echo $t['anot_posterior']; ?></td>
                <td>
                <button><a href="?c=task&a=Crud&id=<?php echo $t['id_task']; ?>">Editar</a></button>
                </td>
                <td>
                    <button><a href="views/task/delete.php">Eliminar</a></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>