<?php if(!isset($_SESSION['logueado'])): ?>
    <?php echo e(header('Location:' . BASE_URL . 'login')); ?>

    <?php echo e(exit()); ?>

<?php else: ?>
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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/<?php echo e($_SESSION['theme']); ?>/navbar.css" />
        <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/theme1/footer.css" />
        <link rel="stylesheet" href="<?php echo e(ASSETS_URL); ?>css/settings.css" />



        <?php echo $__env->yieldContent('link'); ?>
    </head>

    <body>
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
            <img src="<?php echo e(ASSETS_URL); ?>img/logo3.png" class="logoI"><span
                class="logoN"><b>NoSeCaeN</b> S.L.</span>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class=" navbar-collapse justify-content-start">
                <div class="navbar-nav ml-auto">
                    <?php echo $__env->yieldContent('nav'); ?>
                    <div class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-item nav-link  user-action"><img
                                src="<?php echo e(ASSETS_URL); ?>img/user/<?php echo e($_SESSION['ulogo']); ?>.jpg" class="imgUser"
                                alt="Avatar"> <?php echo e($_SESSION['names']); ?><b class="caret"></b></a>
                        <div class="dropdown-menu">
                            <a href="<?php echo e(BASE_URL); ?>form_setting" class="dropdown-item"><i
                                    class="fa fa-sliders"></i> Ajustes</a>
                            <div class="divider dropdown-divider"></div>
                            <a href="<?php echo e(BASE_URL); ?>logout" class="dropdown-item"><i
                                    class="material-icons">&#xE8AC;</i>
                                Desconectar</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <?php echo $__env->yieldContent('cuerpo'); ?>


        </div>
        <br> <br>

        <footer class="footer-07">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <h2 class="footer-heading logo">NoSeCaeN S.L.</h2>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-center">
                        <p class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            @copyright
                            <script>
                                document.write(new Date().getFullYear());
                            </script> - Todos los derechos reservados | Esta web esta realizada <i
                                class="ion-ios-heart" aria-hidden="true"></i> por <span>Sebas Gómez</span>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script src="<?php echo e(ASSETS_URL); ?>js/jquery.min.js"></script>
        <script src="<?php echo e(ASSETS_URL); ?>js/popper.js"></script>
        <script src="<?php echo e(ASSETS_URL); ?>js/bootstrap.min.js"></script>

        <?php echo $__env->yieldContent('script'); ?>
    </body>

    </html>

<?php endif; ?>
<?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/plantilla.blade.php ENDPATH**/ ?>