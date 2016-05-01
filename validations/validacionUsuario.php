<?php   

function checkTablaUsuario($nombre , $clave) {
	$erroresServidor = "<ol>";
	if ($nombre == "")
		$erroresServidor .= "<li> Color incorrecto </li>";
	if ($clave== "")
		$erroresServidor .= "<li> Clave incorrecta </li>";
	if (strlen($clave) > 6) 
		$erroresServidor .= "<li> Tamaño de clave incorrecto</li>";

	if ($erroresServidor == "<ol>")
		$erroresServidor = "";
	else 
		$erroresServidor .= "</ol>";
	return $erroresServidor ;
}

?>