

<?php $__env->startSection('link'); ?>

    <!-- Latest minified bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest minified bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/<?php echo e($_SESSION['theme']); ?>/changes.css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
    <a href="<?php echo e(BASE_URL); ?>list?pag=1" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>
    <?php if($type == 'admin'): ?>
        <a href="<?php echo e(BASE_URL); ?>listU?pag=1" class="nav-item nav-link"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    <?php else: ?>
        <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Empleados</span></a>
    <?php endif; ?>
    <a href="<?php echo e(BASE_URL); ?>profile?idU=<?php echo e($_SESSION['id']); ?>" class="nav-item nav-link"><i
            class="fa fa-user"></i><span> Perfil</span></a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>

    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header flex-column">
                <h4 class="modal-title w-100">AJUSTES DE LA APLICACION</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form id="frm-tarea" action="setting" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tema (colores): Actual -><div class="<?php echo e($_SESSION['theme']); ?>"></div>
                                </label>
                                <select name="theme" class="form-control selectpicker">
                                    <?php if($_SESSION['theme'] == 'theme1'): ?>
                                        <option value="theme1" selected>Tema 1 (naranjado)</option>
                                        <option value="theme2">Tema 2 (azulado)</option>
                                        <option value="theme3">Tema 3 (morado)</option>
                                    <?php elseif($_SESSION['theme'] == 'theme2'): ?>
                                        <option value="theme1">Tema 1 (naranjado)</option>
                                        <option value="theme2" selected>Tema 2 (azulado)</option>
                                        <option value="theme3">Tema 3 (morado)</option>
                                    <?php else: ?>
                                        <option value="theme1">Tema 1 (naranjado)</option>
                                        <option value="theme2">Tema 2 (azulado)</option>
                                        <option value="theme3" selected>Tema 3 (morado)</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Numero de registros de tareas a mostrar en la lista (Max 5)</label>
                                <?php if(!$_POST): ?>
                                    <input type="text" class="form-control" name="listT" placeholder="Escribe un numero"
                                        value="<?php echo e($listT); ?>">
                                <?php elseif(ErrorShow('listT', $error) == ''): ?>
                                    <input type="text" class="form-control is-valid" name="listT"
                                        placeholder="Escribe un numero" value="<?php echo e($listT); ?>">
                                <?php else: ?>
                                    <input type="text" class="form-control is-invalid" name="listT"
                                        placeholder="Escribe un numero" value="<?php echo e($listT); ?>">
                                <?php endif; ?>
                            </div>
                            <?php echo ErrorShow('listT', $error); ?>


                            <div class="form-group">
                                <label for="">Numero de registros de empleados mostrados en la lista (Max 5)</label>
                                <?php if(!$_POST): ?>
                                    <input type="text" class="form-control" name="listU" placeholder="Escribe un numero"
                                        value="<?php echo e($listU); ?>">
                                <?php elseif(ErrorShow('listU', $error) == ''): ?>
                                    <input type="text" class="form-control is-valid" name="listU"
                                        placeholder="Escribe un numero" value="<?php echo e($listU); ?>">
                                <?php else: ?>
                                    <input type="text" class="form-control is-invalid" name="listU"
                                        placeholder="Escribe un numero" value="<?php echo e($listU); ?>">
                                <?php endif; ?>
                            </div>
                            <?php echo ErrorShow('listU', $error); ?>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo e(BASE_URL); ?>list?pag=1">Cancelar</a>
                <input type="submit" class="btn btn-info" value="Guardar">
            </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/form_setting.blade.php ENDPATH**/ ?>