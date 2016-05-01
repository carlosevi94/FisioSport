<?php

function checkTablaCliente($IDCliente, $DniPersona) {
	$erroresServidor = "<ol>";
	if ($IDCliente == "")
		$erroresServidor .= "<li> IDCliente vacio </li>";
	if (is_numeric($IDCliente) == FALSE)
		$erroresServidor .= "<li> IDCliente no es un numero </li>";
	if ($DniPersona == "")
		$erroresServidor .= "<li> DNI de la persona vacio </li>";
	if (dnivalidoCliente($DniPersona) == FALSE)
		$erroresServidor .= "<li> DNI incorrecto</li>";

	if ($erroresServidor == "<ol>")
		$erroresServidor = "";
	else
		$erroresServidor .= "</ol>";
	return $erroresServidor;
}

function dnivalidoCliente($string) {
	if (strlen($string) != 9 || preg_match('/^[XYZ]?([0-9]{7,8})([A-Z])$/i', $string, $matches) !== 1) {
		return false;
	}

	$map = 'TRWAGMYFPDXBNJZSQVHLCKE';

	list(, $number, $letter) = $matches;

	return strtoupper($letter) === $map[((int)$number) % 23];
}
?>