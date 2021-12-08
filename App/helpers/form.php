<?php

/**
 * Funciones de ayuda que nos permitirán trabajar con formularios
 * 
 */

/**
 * Devuelve el valor de una variable enviada por POST. Devolverá el valor
 * por defecto en caso de no existir.
 * 
 * @param string $campo
 * @param string $default   Valor por defecto en caso de no existir
 * @return string
 */
function ValorPost($campo, $default = '')
{
    if (isset($_POST[$campo])) {
        return $_POST[$campo];
    } else {
        return $default;
    }
}

function ErrorShow($campo, $error)
{
    if ($_POST) {
        return $error->ErrorFormateado($campo);
    } else {
        return "";
    }
}
