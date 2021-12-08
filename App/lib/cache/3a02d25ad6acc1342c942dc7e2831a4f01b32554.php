

<?php $__env->startSection('link'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/theme1/profile.css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>
    <a href="<?php echo e(BASE_URL); ?>list?pag=1" class="nav-item nav-link"><i class="fa fa-gears"></i><span>Tareas</span></a>
    <?php if($type == 'admin'): ?>
        <a href="<?php echo e(BASE_URL); ?>listU?pagU=1" class="nav-item nav-link"><i
                class="fa fa-users"></i><span>Empleados</span></a>
    <?php else: ?>
        <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Empleados</span></a>
    <?php endif; ?>
    <a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
    <a href="<?php echo e(BASE_URL); ?>profile?idU=<?php echo e($_SESSION['id']); ?>" class="nav-item nav-link active"><i class="fa fa-user"></i><span> Perfil</span></a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                    <img src="<?php echo e(ASSETS_URL); ?>img/logo2.png"
                        alt="stack photo" class="img">
                </div>
                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                    <div class="container" style="border-bottom:1px solid black">
                        <h2><?php echo e($nombre); ?></h2>
                    </div>
                    <hr>
                    <br>
                    <ul class="container details">
                        <li>
                            <p><span class="glyphicon glyphicon-user" style="width:50px;"></span><?php echo e($nombre); ?></p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-tag" style="width:50px;"></span><?php echo e($usuario); ?></p>
                        </li>
                        <li>
                            <p><span class="glyphicon glyphicon-briefcase" style="width:50px;"></span><?php echo e($type); ?>

                            </p>
                        </li>
                    </ul>
                    <br>
                    <a aria-label='Thanks' class='h-button centered bton' data-text='Editar datos' href="<?php echo e(BASE_URL); ?>edit-profile?idU=<?php echo e($_REQUEST['idU']); ?>&eprofile=1">
                        <span>C</span>
                        <span>l</span>
                        <span>i</span>
                        <span>c</span>
                        <span>k</span>
                        <span></span>
                        <span>A</span>
                        <span>q</span>
                        <span>u</span>
                        <span>i</span>
                      </a>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/user/profile.blade.php ENDPATH**/ ?>