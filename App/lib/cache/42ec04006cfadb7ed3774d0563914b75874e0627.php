

<?php $__env->startSection('link'); ?>
<link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/<?php echo e($_SESSION['theme']); ?>/confirm-delete.css"/>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('nav'); ?>
<a href="<?php echo e(BASE_URL); ?>list?pag=1" class="nav-item nav-link active"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
<?php if($type =='admin'): ?>
        <a href="<?php echo e(BASE_URL); ?>listU?pagU=1" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<?php else: ?>
        <a href="#" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<?php endif; ?>
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
<a href="<?php echo e(BASE_URL); ?>profile?idU=<?php echo e($_SESSION['id']); ?>" class="nav-item nav-link"><i class="fa fa-user"></i><span> Perfil</span></a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>

    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>
                <h4 class="modal-title w-100">Eliminacion de empleado</h4>
            </div>
            <div class="modal-body">
                <p>¿Esta segur@ de que desea eliminar a este empleado? Esta accion no puede deshacerse</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="<?php echo e(BASE_URL); ?>listU?pagU=1" class="bton btn-secondary" data-dismiss="modal">Cancelar</a>
                <a href="<?php echo e(BASE_URL); ?>delU?id=<?php echo e($id); ?>" class="bton btn-danger">Eliminar</a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/user/deleteU.blade.php ENDPATH**/ ?>