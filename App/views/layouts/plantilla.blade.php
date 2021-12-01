<!DOCTYPE html>
<html lang="en">

<head>
    {{ include LAYOUT_PATH . 'head.php' }}
</head>

<body>
    {{ include LAYOUT_PATH . 'navbar.php' }}

    <div class="container">
        @yield('cuerpo')
    </div>

    @yield('footer')

</body>

</html>

