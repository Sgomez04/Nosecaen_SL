<?php
$hayError = FALSE;
$errores = [];

/*
/// FILTRADO DEL CAMPO persona ///
if (ValorPost('persona') == '') {
    $hayError = true;
    $errores['persona'] = 'El campo no puede estar vacio';
} elseif (filter_var(ValorPost('persona'), FILTER_VALIDATE_INT)) {
    $hayError = true;
    $errores['persona'] = 'El nombre y apellidos no pueden contener carácteres numéricos';
} elseif (preg_match("/\W/", ValorPost('persona'))) {
    $hayError = true;
    $errores['persona'] = 'El nombre y apellidos no pueden contener carácteres especiales';
}


/// FILTRADO DEL CAMPO telefono /// 
if (ValorPost('telefono') == '') {
    $errores['telefono'] = 'El campo telefono no puede estar vacio';
    $hayError = true;
} elseif (!filter_var(ValorPost('telefono'), FILTER_VALIDATE_INT)) {
    $errores['telefono'] = 'El numero de telefono solo puede contener numeros';
    $hayError = true;
} elseif (strlen(ValorPost('telefono')) > 9) {
    $errores['telefono'] = 'El campo telefono solo puede contener 9 digitos';
    $hayError = true;
}

/// FILTRADO DEL CAMPO descripcion ///
if (ValorPost('descripcion') == '') {
    $errores['descripcion'] = 'El campo descripcion no puede estar vacio';
    $hayError = true;
}

/// FILTRADO DEL CAMPO email  ///
if (ValorPost('correo') == '') {
    $hayError = true;
    $errores['correo'] = 'El campo correo no puede estar vacio.';
} elseif (!filter_var(ValorPost('correo'), FILTER_VALIDATE_EMAIL)) {
    $hayError = true;
    $errores['correo'] = 'Introduzca un correo válido.';
}

/// FILTRADO DEL CAMPO direccion ///
if (ValorPost('direccion') == '') {
    $hayError = true;
    $errores['direccion'] = 'El campo direccion no puede estar vacio';
}

/// FILTRADO DEL CAMPO poblacion ///
if (ValorPost('poblacion') == '') {
    $hayError = true;
    $errores['poblacion'] = 'El campo no puede estar vacio';
} elseif (filter_var(ValorPost('poblacion'), FILTER_VALIDATE_INT)) {
    $hayError = true;
    $errores['poblacion'] = 'El nombre de la poblacion no puede contener carácteres numéricos';
} elseif (preg_match("/\W/", ValorPost('persona'))) {
    $hayError = true;
    $errores['poblacion'] = 'El nombre de la poblacion no puede contener carácteres especiales';
}

/// FILTRADO DEL CAMPO codigoPostal///
if (ValorPost('cp') == '') {
    $hayError = true;
    $errores['cp'] = 'El campo Codigo postal no puede estar vacio';
} elseif (!filter_var(ValorPost('cp'), FILTER_VALIDATE_INT)) {
    $hayError = true;
    $errores['cp'] = 'El campo Codigo postal debe contener únicamente carácteres númericos';
} elseif (strlen(ValorPost('cp')) > 5) {
    $errores['cp'] = 'El campo Codigo postal no puede ser mayor de 5 numeros';
    $hayError = true;
}

/// FILTRADO DEL CAMPO provincia ///
// if (ValorPost('provincia') == '') {
//     $hayError = true;
//     $errores['provincia'] = 'Tienes que seleccionar una provincia';
// }

/// FILTRADO DEL CAMPO operario ///
if (ValorPost('operario') == '') {
    $hayError = true;
    $errores['operario'] = 'El campo no puede estar vacio';
} elseif (filter_var(ValorPost('persona'), FILTER_VALIDATE_INT)) {
    $hayError = true;
    $errores['operario'] = 'El nombre del operario no puede contener carácteres numéricos';
} elseif (preg_match("/\W/", ValorPost('persona'))) {
    $hayError = true;
    $errores['operario'] = 'El nombre del operario no puede contener carácteres especiales';
}

// FILTRADO DEL CAMPO fecha de realizacion //
if (ValorPost('fechaR') == '') {
    $hayError = true;
    $errores['fechaR'] = 'El campo no puede estar vacio';
} else {
    $fecha = explode('/', ValorPost('fechaR'));
    if (!checkdate($fecha[1], $fecha[2], $fecha[0])) {
        $hayError = true;
        $errores['fechaR'] = 'Introduzca una fecha válida.';
    }
}

*/
