<?php
    function checkTablaActividadEspecifica($IDActividad,$Nombre,$Descripcion){
		$erroresServidor = "<ol>";
		
	
		
	
	
	
	
	if ($Nombre== "" || strlen($Nombre) > 50)
		$erroresServidor .= "<li> Nombre vacio o superior a 50 caracteres</li>";
	
	if ($Descripcion== "" || strlen($Descripcion) > 255)
		$erroresServidor .= "<li> Descripcion vacio o superior a 255 caracteres</li>";

	if ($erroresServidor == "<ol>")
		$erroresServidor = "";
	else 
		$erroresServidor .= "</ol>";
	
	return $erroresServidor ;
	}
?>