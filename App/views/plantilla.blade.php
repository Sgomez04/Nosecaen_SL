@if (!isset($_SESSION['logueado']))
    {{ header('Location:' . BASE_URL . 'login') }}
    {{ exit() }}
@else
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>NoSeCaen S.L</title>
        <link rel="stylesheet" href="{{ ASSETS_URL }}css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="{{ ASSETS_URL }}css/bootstrap/bootstrap-theme.css.map" />
        <link rel="stylesheet" href="{{ ASSETS_URL }}css/bootstrap/bootstrap.css" />
        <link rel="stylesheet" href="{{ ASSETS_URL }}css/bootstrap/bootstrap.css.map" />
        <link rel="stylesheet" href="{{ ASSETS_URL }}css/bootstrap/bootstrap-theme.min.css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{ ASSETS_URL }}css/theme1/navbar.css" />
        <link rel="stylesheet" href="{{ ASSETS_URL }}css/theme1/footer.css" />


        @yield('link')
    </head>

    <body>
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
            <img src="{{ ASSETS_URL }}img/logo3.png" class="logoI"><span
                class="logoN"><b>NoSeCaeN</b> S.L.</span>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class=" navbar-collapse justify-content-start">
                <div class="navbar-nav ml-auto">
                    @yield('nav')
                    <div class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-item nav-link  user-action"><img
                                src="{{ ASSETS_URL }}img/user/{{ $_SESSION['ulogo'] }}.jpg" class="imgUser"
                                alt="Avatar"> {{ $_SESSION['names'] }}<b class="caret"></b></a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> Ajustes</a>
                            <div class="divider dropdown-divider"></div>
                            <a href="{{ BASE_URL }}logout" class="dropdown-item"><i
                                    class="material-icons">&#xE8AC;</i>
                                Desconectar</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        @yield('cuerpo')


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
        <script src="{{ ASSETS_URL }}js/jquery.min.js"></script>
        <script src="{{ ASSETS_URL }}js/popper.js"></script>
        <script src="{{ ASSETS_URL }}js/bootstrap.min.js"></script>

        @yield('script')

    </body>

    </html>

@endif
