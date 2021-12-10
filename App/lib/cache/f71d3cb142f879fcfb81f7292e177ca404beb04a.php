

<?php $__env->startSection('link'); ?>

<link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/<?php echo e($_SESSION['theme']); ?>/listU.css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
<a href="<?php echo e(BASE_URL); ?>list?pag=1" class="nav-item nav-link"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
<a href="<?php echo e(BASE_URL); ?>listU?pagU=1" class="nav-item nav-link active"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
<a href="<?php echo e(BASE_URL); ?>profile?idU=<?php echo e($_SESSION['id']); ?>" class="nav-item nav-link"><i class="fa fa-user"></i><span> Perfil</span></a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('cuerpo'); ?>
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
                    <?php $__currentLoopData = UserController::getInstance()->listarUsuarios(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="list">
                            <td>
                                <a href="<?php echo e(BASE_URL); ?>formU?idU=<?php echo e($u['id_employer']); ?>" class="edit"><i
                                        class="material-icons" title="Editar Tarea">&#xE254;</i></a>
                                <br>
                                <br>
                                <a href="<?php echo e(BASE_URL); ?>cdelU?idU=<?php echo e($u['id_employer']); ?>" class="delete"><i
                                        class="material-icons" title="Eliminar Tarea">&#xE872;</i></a>
                            </td>
                            <td><b><?php echo e($u['id_employer']); ?></b></td>
                            <td><?php echo e($u['user']); ?> </td>
                            <td><?php echo e($u['passwords']); ?> </td>
                            <td><?php echo e($u['types']); ?> </td>
                            <td><?php echo e($u['names']); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <div class="hint-text">Mostrando <b><?php echo e($_SESSION['listU']); ?></b> de
                <b><?php echo e(UserController::getInstance()->tResultadosU()); ?></b> registros
            </div>
            <b class="pagination"> <?php echo e(UserController::getInstance()->paginacionU()); ?></b>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?= ASSETS_URL ?>js/orderby.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/user/listU.blade.php ENDPATH**/ ?>