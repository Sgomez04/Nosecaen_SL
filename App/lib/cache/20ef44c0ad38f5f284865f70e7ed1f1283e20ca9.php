

<?php $__env->startSection('cuerpo'); ?>
    <h1 class="page-header">Tareas (<?php echo e(TaskController::getInstance()->tResultados()); ?> registradas) </h1>
    <?php if($type == 'admin'): ?>
        <div class="well well-sm text-right">
            <a class="btn btn-primary" href="<?= BASE_URL ?>form">Nueva Tarea</a>
        </div>
    <?php endif; ?>

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
                    <?php $__currentLoopData = TaskController::getInstance()->listar(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo $t['id_task']; ?></th>
                            <td><?php echo e($t['persona']); ?> </td>
                            <td><?php echo e($t['telefono']); ?> </td>
                            <td><textarea cols="20" rows="5" readonly><?php echo e($t['descripcion']); ?> </textarea></td>
                            <td><?php echo e($t['correo']); ?></td>
                            <td><?php echo e($t['direccion']); ?></td>
                            <td><?php echo e($t['poblacion']); ?></td>
                            <td><?php echo e($t['cp']); ?></td>
                            <td><?php echo e($t['provincia']); ?></td>
                            <td><?php echo e($t['estado']); ?></td>
                            <td><?php echo e($t['fecha_creacion']); ?></td>
                            <td><?php echo e($t['operario']); ?></td>
                            <td><?php echo e($t['fecha_realizacion']); ?></td>
                            <td><textarea cols="20" rows="5" readonly><?php echo e($t['anot_anterior']); ?></textarea></td>
                            <td><textarea cols="20" rows="5" readonly><?php echo e($t['anot_posterior']); ?></textarea></td>
                            <td>
                                <!-- <a class="btn btn-outline-secondary btn-lg" href="?c=task&a=edit&id=<?php echo $t['id_task']; ?>">Editar</a> -->
                                <a class="btn btn-outline-secondary btn-lg"
                                    href="<?= BASE_URL ?>form?id=<?php echo e($t['id_task']); ?>">Editar</a>
                            </td>
                            <?php if($type == 'admin'): ?>
                            <td>
                                <a class="btn btn-outline-secondary btn-lg"
                                    href="<?= BASE_URL ?>cdel?id=<?php echo e($t['id_task']); ?>">Eliminar</a>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="paginas">
        <?php echo e(TaskController::getInstance()->paginacion()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/task/list.blade.php ENDPATH**/ ?>