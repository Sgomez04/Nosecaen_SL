<h1 class="page-header">Tareas (<?php echo $this->model->mostrarTotalResultados() ?> registradas)  
</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=task&a=Crud">Nueva Tarea</a>
</div>



<table class="table table-striped"  >
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
        <?php foreach ($this->model->listaTareas() as $t) : ?>
            <tr>
                <th scope="row"><?php echo $t['id_task']; ?></th>
                <td><?php echo $t['persona']; ?></td>
                <td><?php echo $t['telefono']; ?></td>
                <td><textarea cols="20" rows="5" readonly><?php echo $t['descripcion']; ?></textarea></td>
                <td><?php echo $t['correo']; ?></td>
                <td><?php echo $t['direccion']; ?></td>
                <td><?php echo $t['poblacion']; ?></td>
                <td><?php echo $t['cp']; ?></td>
                <td><?php echo $t['provincia']; ?></td>
                <td><?php echo $t['estado']; ?></td>
                <td><?php echo $t['fecha_creacion']; ?></td>
                <td><?php echo $t['operario']; ?></td>
                <td><?php echo $t['fecha_realizacion']; ?></td>
                <td><textarea cols="20" rows="5" readonly><?php echo $t['anot_anterior']; ?></textarea></td>
                <td><textarea cols="20" rows="5" readonly><?php echo $t['anot_posterior']; ?></textarea></td>
                <td>
                    <a class="btn btn-outline-secondary btn-lg" href="?c=task&a=Crud&id=<?php echo $t['id_task']; ?>">Editar</a>
                </td>
                <td>
                    <a class="btn btn-outline-secondary btn-lg" href="?c=task&a=cEliminar&id=<?php echo $t['id_task']; ?>&pag=<?php echo $this->model->mostrarPag();?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div id="paginas">
    <?php
    $this->model->mostrarPaginas();
    ?>
</div>