<?php $__env->startSection('link'); ?>
<link rel="stylesheet" href="<?= ASSETS_URL ?>css/login.css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('nav'); ?>

<?php if(isset($_SESSION['logeado'])): ?>
<a href="<?= BASE_URL ?>" class="nav-item nav-link active"><i
    class="fa fa-users"></i><span>Inicio</span></a>
<a href="<?= BASE_URL ?>list?pag=1" class="nav-item nav-link"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
<a href="<?= BASE_URL ?>listU?pagU=1" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
<?php else: ?> 
<a href="#" class="nav-item nav-link active"><i
    class="fa fa-users"></i><span>Inicio</span></a>
<a href="#" class="nav-item nav-link"><i
        class="fa fa-gears"></i><span>Tareas</span></a>
<a href="#" class="nav-item nav-link"><i
        class="fa fa-users"></i><span>Empleados</span></a>
<a href="#" class="nav-item nav-link"><i class="fa fa-search"></i><span>Busqueda</span></a>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>
  <div class="modal-dialog modal-login">
    <div class="modal-content">
        <div class="modal-header">
            <div class="avatar">
                <img src="<?= ASSETS_URL ?>img/avatar.png" alt="Avatar">
            </div>
            <h4 class="modal-title">Login Empleado</h4>
            <a href="" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
        </div>
        <div class="modal-body">
            <form action="check" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="user" placeholder="Usuario" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña"
                        required="required">
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                </div>
                <label><input type="checkbox" name="recuerdo" <?php if (isset($_COOKIE['recuerdo'])) {
                  echo ' checked';} ?>> Recuérdeme</label>
                <br>
                <label><input type="checkbox" name="abierta" <?php if (isset($_COOKIE['abierta'])) { echo ' checked';} ?>> Mantener la sesión abierta</label>
            </form>
        </div>
        <div class="modal-footer">
        </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>NoSeCaen S.L</title>
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/bootstrap/bootstrap-theme.css.map" />
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/bootstrap/bootstrap.css" />
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/bootstrap/bootstrap.css.map" />
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/bootstrap/bootstrap-theme.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/navbar.css" />

    <?php echo $__env->yieldContent('link'); ?>
</head>

<body>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <a href="#" class="navbar-brand"><i class="fa fa-cube"></i><b>NoSeCaen</b> S.L</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class=" navbar-collapse justify-content-start">
            <div class="navbar-nav ml-auto">
                <?php echo $__env->yieldContent('nav'); ?>
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link  user-action"> Login <b class="caret"></b></a>
                    <div class="dropdown-menu">
                        <a href="<?= BASE_URL ?>profile" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Settings</a>
                        <div class="divider dropdown-divider"></div>
                        <a href="<?= BASE_URL ?>logout" class="dropdown-item"><i class="material-icons">&#xE8AC;</i>
                            Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <?php echo $__env->yieldContent('cuerpo'); ?>

    <div class="col-xs-12">
        <hr />
        <footer class="text-center well">
            <p>Copyright (c) 2021 NoSeCaen S.L
                All Rights Reserved

                This product is protected by copyright and distributed under
                licenses restricting copying, distribution, and decompilation. </p>
        </footer>
    </div>


    <script src="<?= ASSETS_URL ?>js/jquery.min.js"></script>
    <script src="<?= ASSETS_URL ?>js/popper.js"></script>
    <script src="<?= ASSETS_URL ?>js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/user/login.blade.php ENDPATH**/ ?>