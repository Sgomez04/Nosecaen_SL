<?php

/// FILTRADO DEL CAMPO persona ///
if (empty($_REQUEST['persona'])) {
    $error->AnotaError("persona","El campo no puede estar vacio");
} elseif (filter_var($_REQUEST['persona'], FILTER_VALIDATE_INT)) {
    $error->AnotaError("persona","El nombre y apellidos no pueden contener carácteres numéricos");
} elseif (preg_match("/\W/", $_REQUEST['persona'])) {
   $error->AnotaError("persona", "El nombre y apellidos no pueden contener carácteres especiales");
}



/// FILTRADO DEL CAMPO telefono /// 
if (empty($_REQUEST['telefono'])) {
    $error->AnotaError("telefono",'El campo telefono no puede estar vacio');
} elseif (!filter_var($_REQUEST['telefono'], FILTER_VALIDATE_INT)) {
    $error->AnotaError("telefono",'El numero de telefono solo puede contener numeros');
} elseif (strlen($_REQUEST['telefono']) > 9) {
    $error->AnotaError("telefono",'El campo telefono solo puede contener 9 digitos');
}

/// FILTRADO DEL CAMPO descripcion ///
if (empty($_REQUEST['descripcion'])) {
    $error->AnotaError("descripcion",'El campo descripcion no puede estar vacio');
}

/// FILTRADO DEL CAMPO email  ///
if (empty($_REQUEST['correo'])) {
    $error->AnotaError("correo",'El campo correo no puede estar vacio.');
} elseif (!filter_var($_REQUEST['correo'], FILTER_VALIDATE_EMAIL)) {
    $error-> AnotaError("correo",'Introduzca un correo válido.');
}

/// FILTRADO DEL CAMPO direccion ///
if (empty($_REQUEST['direccion'])) {
    $error->AnotaError("direccion",'El campo direccion no puede estar vacio');
}

/// FILTRADO DEL CAMPO poblacion ///
if (empty($_REQUEST['poblacion'])) {
    $error->AnotaError("poblacion",'El campo no puede estar vacio');
} elseif (filter_var($_REQUEST['poblacion'], FILTER_VALIDATE_INT)) {
    $error->AnotaError("poblacion",'El nombre de la poblacion no puede contener carácteres numéricos');
} elseif (preg_match("/\W/", $_REQUEST['poblacion'])) {
    $error->AnotaError("poblacion",'El nombre de la poblacion no puede contener carácteres especiales');
}

/// FILTRADO DEL CAMPO codigoPostal///
if (empty($_REQUEST['cp'])) {
    $error->AnotaError("cp",'El campo Codigo postal no puede estar vacio');
} elseif (!filter_var($_REQUEST['cp'], FILTER_VALIDATE_INT)) {
    $error->AnotaError("cp",'El campo Codigo postal debe contener únicamente carácteres númericos');
} elseif (strlen($_REQUEST['cp']) > 5) {
    $error->AnotaError("cp",'El campo Codigo postal no puede ser mayor de 5 numeros');
}

/// FILTRADO DEL CAMPO provincia ///
if (empty($_REQUEST['provincia'])) {
    $error -> AnotaError("provincia",'Tienes que seleccionar una provincia');
}

/// FILTRADO DEL CAMPO operario ///
if (empty($_REQUEST['operario'])) {
    $error->AnotaError("operario",'El campo no puede estar vacio');
} elseif (filter_var($_REQUEST['persona'], FILTER_VALIDATE_INT)) {
    $error->AnotaError("operario",'El nombre del operario no puede contener carácteres numéricos');
} elseif (preg_match("/\W/", $_REQUEST['persona'])) {
    $error->AnotaError("operario",'El nombre del operario no puede contener carácteres especiales');
}

// // FILTRADO DEL CAMPO fecha de realizacion //
if ($_REQUEST['fechaR'] == '') {
     $error -> AnotaError("fechaR",'El campo no puede estar vacio');
} else {
    $fecha = explode('-', $_REQUEST['fechaR']);
    if (!checkdate($fecha[1], $fecha[2], $fecha[0])) {
       $error -> AnotaError("fechaR",'Introduzca una fecha válida (formato yyyy-mm-dd).');
    }
}

