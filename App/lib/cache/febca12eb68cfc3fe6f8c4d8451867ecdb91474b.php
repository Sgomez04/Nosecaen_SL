<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>NoSeCaen S.L</title>
    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/bootstrap/bootstrap-theme.css.map" />
    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/bootstrap/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/bootstrap/bootstrap.css.map" />
    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/bootstrap/bootstrap-theme.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Modal library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    
    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/theme1/navbar.css" />
    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/login.css" />
    <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/theme1/footer.css" />
</head>

<body>
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <img src="<?php echo e(ASSETS_URL); ?>img/logo3.png" class="logoI"><span class="logoN"><b>NoSeCaeN</b>
            S.L.</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class=" navbar-collapse justify-content-start">
            <div class="navbar-nav ml-auto">
                <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i
                        class="fa fa-gears"></i><span>Tareas</span></a>
                <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i
                        class="fa fa-users"></i><span>Empleados</span></a>
                <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#exampleModalCenter"><i
                        class="fa fa-user"></i><span> Perfil</span></a>
            </div>
        </div>
    </nav>

    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <img src="<?php echo e(ASSETS_URL); ?>img/avatar.png" alt="Avatar">
                </div>
                <h4 class="modal-title">Login Empleado</h4>
            </div>
            <br>
            <center> <?php echo ErrorShow('login', $error); ?></center>
            <br>
            <div class="modal-body">
                <form action="<?php echo e(BASE_URL); ?>check" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user" placeholder="Usuario" required="required" value="<?php echo e($user); ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña"
                            required="required" value="<?php echo e($password); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit"
                            class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                    </div>
                    <label><input type="checkbox" name="recuerdo" <?php if (isset($_COOKIE['recuerdo'])) {
    echo ' checked';
} ?>> Recuérdeme</label>
                    <br>
                    <label><input type="checkbox" name="abierta" <?php if (isset($_COOKIE['abierta'])) {
    echo ' checked';
} ?>> Mantener la sesión abierta</label>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>


    </div>
    <br> <br>

    <footer class="footer-07">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h2 class="footer-heading"><a href="#" class="logo">NoSeCaeN S.L.</a></h2>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <script>
                            document.write(new Date().getFullYear());
                        </script> Todos los derechos reservados | Esta web esta realizada <i
                            class="ion-ios-heart" aria-hidden="true"></i> por <span>Sebas Gómez</span>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <script src="<?php echo e(ASSETS_URL); ?>js/jquery.min.js"></script>
    <script src="<?php echo e(ASSETS_URL); ?>js/popper.js"></script>
    <script src="<?php echo e(ASSETS_URL); ?>js/bootstrap.min.js"></script>

    <?php echo $__env->yieldContent('script'); ?>

    
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-confirm">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Acceso Denegado</h4>
                </div>
                <div class="modal-body">
                    <br>
                    <p>Por favor, accede con tu cuenta de empleado</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="#" class="bton btn-danger" data-dismiss="modal">Cerrar</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL_final\App\views/user/login.blade.php ENDPATH**/ ?>