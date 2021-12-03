

<?php $__env->startSection("cuerpo"); ?>
    <h1>Eliminacion de la tarea</h1>
    <p>¿Esta segur@ de que desea eliminar la tarea?</p>
    <a href="<?=BASE_URL?>del?id=<?php echo e($id); ?>">Eliminar</a>
    <a href="<?=BASE_URL?>list">Volver Atras</a></button>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/task/delete.blade.php ENDPATH**/ ?>