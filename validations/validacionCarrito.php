<?php
    function checkCarrito($IDProducto,$IDCliente,$Unidades){
    	$erroresServidor = "<ol>";
		
	if ($IDProducto == "")
		$erroresServidor .= "<li> IDProducto vacio </li>";
	if(is_numeric($IDProducto)==FALSE)
		$erroresServidor .= "<li> IDProducto no es un numero </li>";
		
		
	if ($IDCliente == "")
		$erroresServidor .= "<li> IDCliente vacio </li>";
	if(is_numeric($IDCliente)==FALSE)
		$erroresServidor .= "<li> IDCliente no es un numero </li>";
		
	if ($Unidades == "")
		$erroresServidor .= "<li> Unidades vacio </li>";
	if(is_numeric($Unidades)==FALSE)
		$erroresServidor .= "<li> Unidades no es un numero </li>";
	
		if ($erroresServidor == "<ol>")
			$erroresServidor = "";
		else 
			$erroresServidor .= "</ol>";
		return $erroresServidor ;
		
    }
?>