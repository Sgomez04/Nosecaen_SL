<?php

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


/**
*Devuelve el valor de un error, si existe, segun se campo
 * 
 * @param string $campo
 * @param objet $error   
 * @return string
 */
function ErrorShow($campo, $error)
{
    if ($_POST) {
        return $error->ErrorFormateado($campo);
    } else {
        return "";
    }
}
