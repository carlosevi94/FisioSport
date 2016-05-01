<?php
    function checkTablaPersona($nombre,$apellidos,$dni,$email,$sexo,$telefono,$fechaNac,$direccion,$pass){
		$erroresServidor = "<ol>";
	if ($nombre == "")
		$erroresServidor .= "<li> Nombre vacio </li>";
	if (strlen($nombre) > 50) 
		$erroresServidor .= "<li> Tamaño del nombre incorrecto</li>";
	
	
	if ($pass== "")
		$erroresServidor .= "<li> Clave vacia </li>";	
	if (strlen($pass) > 32) 
		$erroresServidor .= "<li> Tamaño de clave incorrecto</li>";
	
	if ($apellidos == "")
		$erroresServidor .= "<li> Apellidos vacio </li>";
	if (strlen($apellidos) > 50) 
		$erroresServidor .= "<li> Tamaño de apellidos incorrecto</li>";
	
	if ($dni == "")
		$erroresServidor .= "<li> DNI vacio </li>";
	if(dnivalido($dni)==false)
		$erroresServidor .= "<li> DNI no valido. </li>";
	
	if ($email == "")
		$erroresServidor .= "<li> Email vacio </li>";
	if(strpos($email,"@")==FALSE)
	    $erroresServidor.="<li> Email no valido</li>";
	if(strlen($email) > 50) 
		$erroresServidor .= "<li> Tamaño de email incorrecto</li>";
	
	if ($sexo == "")
		$erroresServidor .= "<li> Sexo vacio </li>";
	if(!($sexo="H" || $sexo="M"))
		$erroresServidor.= "<li> Valor incorrecto para Sexo </li>";
	
	
	
	if ($telefono == "")
		$erroresServidor .= "<li> Telefono vacio </li>";
	if (strlen($telefono) != "9" ||is_numeric($telefono)==FALSE)
		$erroresServidor .= "<li> Telefono movil incorrecto </li>";
	if(!($telefono[0]==6 || $telefono[0]==7))
		$erroresServidor .= "<li> Telefono incorrecto. El numero de telefono movil debe empezar por 6 o 7 </li>";
	
	if ($fechaNac == "")
		$erroresServidor .= "<li> Fecha de Nacimiento vacia </li>";
	
	if ($direccion == "")
		$erroresServidor .= "<li> Direccion vacio </li>";
	if (strlen($direccion) > 255) 
		$erroresServidor .= "<li> Tamaño de direccion incorrecto</li>";
		
		
	if ($erroresServidor == "<ol>")
		$erroresServidor = "";
	else 
		$erroresServidor .= "</ol>";
	return $erroresServidor ;
		
	}
	
	function dnivalido($string) {
    if (strlen($string) != 9 ||
        preg_match('/^[XYZ]?([0-9]{7,8})([A-Z])$/i', $string, $matches) !== 1) {
        return false;
    }

    $map = 'TRWAGMYFPDXBNJZSQVHLCKE';

    list(, $number, $letter) = $matches;

    return strtoupper($letter) === $map[((int) $number) % 23];
	}
   
?>