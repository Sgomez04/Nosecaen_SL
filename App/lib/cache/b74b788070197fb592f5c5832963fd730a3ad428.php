<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>NoSeCaen S.L</title>

    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/pagination.css" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/header-menu/style.css">
</head>
<body>
    <div class="container-fluid px-md-5">
        <div class="row justify-content-between">
            <div class="col-md-8 order-md-last">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a class="navbar-brand" href="<?= BASE_URL . '?pag=1' ?>">NoSeCaen S.L <span>Instalacion de
                                Ascensores</span></a>
                    </div>
                    <!-- <div class="col-md-6 d-md-flex justify-content-end mb-md-0 mb-3">
                        <form action="#" class="searchform order-lg-last">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control pl-3" placeholder="Search">
                                <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active"><a href="#" class="nav-link">Inicio</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Usuarios</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Tareas</a></li>
                    <!-- <li class="nav-item"><a href="#" class="nav-link">Contact</a></li> -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php echo $__env->yieldContent('cuerpo'); ?>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <hr />
            <footer class="text-center well">
                <p>Copyright (c) 2021 NoSeCaen S.L
                    All Rights Reserved

                    This product is protected by copyright and distributed under
                    licenses restricting copying, distribution, and decompilation. </p>
            </footer>
        </div>
    </div>

    
</body>

</html>
<?php /**PATH D:\Programas\DB\htdocs\PHP\NoSeCaenSL\App\views/plantilla.blade.php ENDPATH**/ ?>