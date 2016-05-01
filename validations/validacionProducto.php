<?php
    function checkTablaProduto($IDProducto, $Nombre, $Descripcion, $Precio, $Stock, $Foto){
    		$erroresServidor = "<ol>";
	/*if ($IDProducto == "")
		$erroresServidor .= "<li> IDProducto vacio </li>";
	if(is_numeric($IDProducto)==FALSE)
		$erroresServidor .= "<li> IDProducto no es un numero </li>";*/
	
	
	if ($Nombre== "")
		$erroresServidor .= "<li> Nombre vacio </li>";
	if (strlen($Nombre) > 255) 
		$erroresServidor .= "<li> Tamaño de nombre incorrecto</li>";
	
	
	if ($Descripcion== "")
		$erroresServidor .= "<li> Descripcion vacia </li>";
	if (strlen($Descripcion) > 255) 
		$erroresServidor .= "<li> Tamaño de descripcion incorrecto</li>";
	
	
	if ($Precio== "")
		$erroresServidor .= "<li> Precio vacio </li>";
	if(is_numeric($Precio)==FALSE)
		$erroresServidor .= "<li> Precio no valido. Aseguresé de que no ha escrito ninguna letra. </li>";
	
	if ($Stock== "")
		$erroresServidor .= "<li> Stock vacio </li>";
	if(is_numeric($Stock)==FALSE)
		$erroresServidor .= "<li> Stock no valido. Aseguresé de que no ha escrito ninguna letra. </li>";
	
	if (strlen($Foto) > 255) 
		$erroresServidor .= "<li> Tamaño del nombre de foto incorrecto</li>";
	
	
	
	if ($erroresServidor == "<ol>")
		$erroresServidor = "";
	else 
		$erroresServidor .= "</ol>";
	return $erroresServidor ;
    }
?>