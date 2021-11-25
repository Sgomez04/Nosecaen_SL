<?php

/**
 * Devuelve el valor de un campo enviado por POST. Si no existe devuelve el valor por defecto
 * @param string $nombreCampo
 * @param mixed $valorPorDefecto
 * @return string
 */

function ValorPost($nombreCampo, $valorPorDefecto = '')
{
	if ($_POST) {
		if (isset($_POST[$nombreCampo]))
			return $_POST[$nombreCampo];
		else
			return $valorPorDefecto;
	}
}

/**
 * Muestra el texto de error si el campo es erroneo
 * @param string $campo Nombre campo
 */

function VerError($campo)
{
	if ($_POST) {
		global $errores;
		if (isset($errores[$campo])) {
			echo '<span style="color:red">' . $errores[$campo] . '</span>';
		}
	}
}

/**
 * Crea un select de provincias de España
 * @param string $name Nombre del campo
 * @param array $opciones Opciones que tiene el select
 * 			clave array=valor option
 * 			valor array=texto option
 * @param string $valorDefecto Valor seleccionado
 * @return string
 */
function CreaSelect($name, $opciones, $valorDefecto = '')
{
	$html = "\n" . '<select name="' . $name . '">';
	foreach ($opciones as $value => $text) {
		if ($value == $valorDefecto)
			$select = 'selected="selected"';
		else
			$select = "";
		$html .= "\n\t<option value=\"$value\" $select>$text</option>";
	}
	$html .= "\n</select>";

	return $html;
}

/**
 * Mostrar datos a modificar de una tarea
 */
function ShowTaskData($campo)
{
	include "add.php";
	global $tareas;
	return $tareas[$campo];
}

/**
 * Mostrar lista de tareas
 * 
 */
function ShowTaskList()
{
	
}
