

<?php $__env->startSection('cuerpo'); ?>
    <h1 class="page-header">Usuarios (<?php echo e(UserController::getInstance()->tResultadosU()); ?> registradas) </h1>

    

    <div class="well well-sm text-right">
        <a class="btn btn-primary" href="<?= BASE_URL ?>formU">Nuevo Usuario</a>
    </div>

    
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
                    <?php $__currentLoopData = UserController::getInstance()->listarUsuarios(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($u['id_employer']); ?></th>
                            <td colspan=2><?php echo e($u['user']); ?> </td>
                            <td><?php echo e($u['passwords']); ?> </td>
                            <td colspan=2><?php echo e($u['types']); ?> </td>
                            <td colspan=2><?php echo e($u['names']); ?></td>
                            <td>
                                <a class="btn btn-outline-secondary btn-lg"
                                    href="<?= BASE_URL ?>formU?idU=<?php echo e($u['id_employer']); ?>">Editar</a>
                            </td>

                            <td>
                                <a class="btn btn-outline-secondary btn-lg"
                                    href="<?= BASE_URL ?>cdelU?idU=<?php echo e($u['id_employer']); ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="paginas">
        <?php echo e(UserController::getInstance()->paginacionU()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/user/listU.blade.php ENDPATH**/ ?>