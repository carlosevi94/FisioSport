<?php
    function checkLineaFactura($IDLineaFactura, $IDProducto,$IDCliente,$IDFactura,$PrecioCompra,$Unidades){
    	$erroresServidor = "<ol>";
		
		
	if ($IDLineaFacturaFactura == "")
		$erroresServidor .= "<li> IDLineaFactura vacio </li>";
	if(is_numeric($IDLineaFacturaFactura)==FALSE)
		$erroresServidor .= "<li> IDLineaFactura no es un numero </li>";
		
	if ($IDProducto == "")
		$erroresServidor .= "<li> IDProducto vacio </li>";
	if(is_numeric($IDProducto)==FALSE)
		$erroresServidor .= "<li> IDProducto no es un numero </li>";
	
	if ($IDCliente == "")
		$erroresServidor .= "<li> IDCliente vacio </li>";
	if(is_numeric($IDCliente)==FALSE)
		$erroresServidor .= "<li> IDCliente no es un numero </li>";	
		
	if ($IDFactura == "")
		$erroresServidor .= "<li> IDFactura vacio </li>";
	if(is_numeric($IDFactura)==FALSE)
		$erroresServidor .= "<li> IDFactura no es un numero </li>";
		
		

		
	if ($PrecioCompra == "")
		$erroresServidor .= "<li> Precio Compra vacio </li>";
	if(is_numeric($PrecioCompra)==FALSE)
		$erroresServidor .= "<li> Precio Compra no es un numero </li>";
		
	
		
		
		
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