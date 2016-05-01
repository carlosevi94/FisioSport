<?php
function checkTablaActividad($Nombre) {
	$erroresServidor = "<ol>";

	if ($Nombre == "" || strlen($Nombre) > 50)
		$erroresServidor .= "<li> Nombre vacio o tamaño superior al tamaño maximo </li>";

	if ($erroresServidor == "<ol>")
		$erroresServidor = "";
	else
		$erroresServidor .= "</ol>";
	return $erroresServidor;
}
?>