<?php
    function checkTablaEntrenamientoEjericios($IDEntrenamiento,$IDActividadEspecifica){
    	$erroresServidor = "<ol>";
	
	if ($IDEntrenamiento == "")
		$erroresServidor .= "<li> IDEntrenamiento vacio </li>";
	if(is_numeric($IDEntrenamiento)==FALSE)
		$erroresServidor .= "<li> IDEntrenamiento no es un numero </li>";
	
	if ($IDActividadEspecifica == "")
		$erroresServidor .= "<li> IDActividadEspecifica vacio </li>";
	if(is_numeric($IDActividadEspecifica)==FALSE)
		$erroresServidor .= "<li> IDActividadEspecifica no es un numero </li>";
	
	
	
	
	
	
	
	
	
	
	if ($erroresServidor == "<ol>")
		$erroresServidor = "";
	else 
		$erroresServidor .= "</ol>";
	return $erroresServidor ;
		
		
	}
		
?>