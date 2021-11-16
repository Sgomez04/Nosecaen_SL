<?php
include "models/functions.php";

if (!$_POST) { // Si no han enviado el fomulario
    // include 'views/login.php';
    include "views/forms/task.php";

} else {
    // include 'connection_db.php';
    // if (checkUser(ValorPost('usuario_inicio'), ValorPost('contraseña'))) {
    //     include "views/menu.php";
    // }else{
    //     //Usuario incorrecto
    //     include 'views/login.php';
    // }
include "models/task_errors.php";

    }
