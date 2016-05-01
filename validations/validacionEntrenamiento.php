<?php
   function checkTablaEntrenamientos($IDEntrenamiento, $IDCliente,$FechaInicio,$FechaFin,$IDActividad,$Descripcion){
   	$erroresServidor = "<ol>";
		
		
	/*if ($IDEntrenamiento == "")
		$erroresServidor .= "<li> IDEntrenamiento vacio </li>";
	if(is_numeric($IDEntrenamiento)==FALSE)
		$erroresServidor .= "<li> IDEntrenamiento no es un numero </li>";*/
		
		
	if ($IDCliente == "")
		$erroresServidor .= "<li> IDCliente vacio </li>";
	if(is_numeric($IDCliente)==FALSE)
		$erroresServidor .= "<li> IDCliente no es un numero </li>";
	
	
	if($FechaInicio=="")
		$erroresServidor .= "<li> Fecha de inicio vacia </li>";
	if(strlen($FechaFin) == 10){
		if(!($FechaInicio[2]=="/" && $FechaInicio[5]=="/"))
			$erroresServidor .= "<li> Fecha de inicio incorrecto. Asegurese de separar los dias, meses y años con una / </li>";
		if(
		!(is_numeric($FechaInicio[0]) &&is_numeric($FechaInicio[1]) &&is_numeric($FechaInicio[3]) &&is_numeric($FechaInicio[4]) &&is_numeric($FechaInicio[6]) &&is_numeric($FechaInicio[7]) &&is_numeric($FechaInicio[8]) && is_numeric($FechaInicio[9])))
			$erroresServidor .= "<li> Fecha de inicio incorrecto </li>";
	}
	
	
	
	if($FechaFin=="")
		$erroresServidor .= "<li> Fecha de fin vacia </li>";
	if(strlen($FechaFin) == 10){
		if(!($FechaFin[2]=="/" && $FechaFin[5]=="/"))
			$erroresServidor .= "<li> Fecha de fin incorrecto. Asegurese de separar los dias, meses y años con una / </li>";
		if(!(is_numeric($FechaFin[0]) &&is_numeric($FechaFin[1]) &&is_numeric($FechaFin[3]) &&is_numeric($FechaFin[4]) 
		&&is_numeric($FechaFin[6]) &&is_numeric($FechaFin[7]) &&is_numeric($FechaFin[8]) && is_numeric($FechaFin[9])))
			$erroresServidor .= "<li> Fecha de fin incorrecto </li>";
	}
	
	
	
	if ($IDActividad == "")
		$erroresServidor .= "<li> IDActividad vacio </li>";
	if(is_numeric($IDActividad)==FALSE)
		$erroresServidor .= "<li> IDActividad no es un numero </li>";
	
	
	if ($Descripcion== "" || strlen($Descripcion) > 255)
		$erroresServidor .= "<li> Nombre vacio o superior a 50 caracteres</li>";

	if ($erroresServidor == "<ol>")
		$erroresServidor = "";
	else 
		$erroresServidor .= "</ol>";
	
	return $erroresServidor ;
   }
?>