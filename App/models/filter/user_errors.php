<?php
/// FILTRADO DEL CAMPO usuario ///
if (empty($_REQUEST['user'])) {
    $error->AnotaError("user","El campo nombre de usuario no puede estar vacio");
} elseif (preg_match("/\W/", $_REQUEST['user'])) {
   $error->AnotaError("user", "El nombre de usuario no pueden contener carácteres especiales");
}

/// FILTRADO DEL CAMPO contraseña /// 
if (empty($_REQUEST['password'])) {
    $error->AnotaError("password",'El campo contraseña no puede estar vacio');
}elseif (preg_match("/\W/", $_REQUEST['password'])) {
    $error->AnotaError("password", "La contraseña no pueden contener carácteres especiales");
 }

/// FILTRADO DEL CAMPO nombre ///
if (empty($_REQUEST['name'])) {
    $error->AnotaError("name",'El campo nombre del empleado no puede estar vacio');
}elseif (preg_match("/\W/", $_REQUEST['name'])) {
    $error->AnotaError("name", "El nombre no pueden contener carácteres especiales");
 }

