<?php
function CrearConexionBD(){
	
	$host="oci:dbname=localhost/XE";
	$usuario="carlos";
	$password="carlos";
	$conexion = null;
	
	try{
		$conexion=new PDO($host,$usuario,$password);
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		//echo "error de conexion".$e->GetMessage();
		header("Location:error.php");
	}
	
	return $conexion;
}

function CerrarConexionBD($conexion){
	$conexion=null;
}
?>
