<?php
       function checkFacturas($IDFactura,$IDCliente,$PrecioTotal){
    	$erroresServidor = "<ol>";
	
	if ($IDFactura == "")
		$erroresServidor .= "<li> IDFactura vacio </li>";
	if(is_numeric($IDFactura)==FALSE)
		$erroresServidor .= "<li> IDFactura no es un numero </li>";
		
		
	if ($IDCliente == "")
		$erroresServidor .= "<li> IDCliente vacio </li>";
	if(is_numeric($IDCliente)==FALSE)
		$erroresServidor .= "<li> IDCliente no es un numero </li>";
		
	if ($PrecioTotal == "")
		$erroresServidor .= "<li> Precio Total vacio </li>";
	if(is_numeric($PrecioTotal)==FALSE)
		$erroresServidor .= "<li> Precio total no es un numero </li>";
	
	
	
	
	
		if ($erroresServidor == "<ol>")
			$erroresServidor = "";
		else 
			$erroresServidor .= "</ol>";
		return $erroresServidor ;
		
    }
?>