<?php 
  if(!isset($_SESSION['logueado']))  // Si no existe la sesión…
    { 
      //MOSTRAMOS a la página de login con el tipo de error ‘fuera’: que indica que
      // se trató de acceder directamente a una página sin loguearse previamente
      header("Location:". BASE_URL. "login");
      // No hay nada más que hacer
      exit;
    }
?>
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
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link  user-action"><img
                            src="https://www.tutorialrepublic.com/examples/images/avatar/3.jpg" class="avatar"
                            alt="Avatar"> <?php echo $_SESSION['names'] ?> <b class="caret"></b></a>
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
    
    <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/plantilla.blade.php ENDPATH**/ ?>