<?php
/// FILTRADO DEL CAMPO listT ///
if (empty($_REQUEST['listT'])) {
    $error->AnotaError("listT","El campo Registros de tareas no puede estar vacio");
} elseif (!filter_var($_REQUEST['listT'], FILTER_VALIDATE_INT)) {
    $error->AnotaError("listT",'El campo Registros de tareas solo puede contener numeros');
}elseif (preg_match("/\W/", $_REQUEST['listT'])) {
   $error->AnotaError("listT", "El Registros de tareas no pueden contener carácteres especiales");
}elseif ($_REQUEST['listT'] > 5) {
    $error->AnotaError("listT",'El campo Registros de tareas no puede ser mayor de 5');
}

/// FILTRADO DEL CAMPO contraseña /// 
if (empty($_REQUEST['listU'])) {
    $error->AnotaError("listU","El campo Registros de empleados no puede estar vacio");
} elseif (!filter_var($_REQUEST['listU'], FILTER_VALIDATE_INT)) {
    $error->AnotaError("listU",'El campo Registros de empleados solo puede contener numeros');
}elseif (preg_match("/\W/", $_REQUEST['listU'])) {
   $error->AnotaError("listU", "El Registros de empleados no pueden contener carácteres especiales");
}elseif ($_REQUEST['listU'] > 5) {
    $error->AnotaError("listU",'El campo Registros de empleados no puede ser mayor de 5');
}
