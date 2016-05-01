<?php

function insertarActividad($nombre){
	$conexion = CrearConexionBD();

	$consultaOracle = "INSERT INTO Actividad (IDActividad, Nombre) 
						VALUES(sec_actividades.nextval,'" . $nombre . "')";

	try{
		$insertar = $conexion -> prepare($consultaOracle);
		$insertar -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Actividad registrada correctamente</strong></div>";
}

function actualizarActividad($IDActividad, $nombre){
	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE Actividad SET NOMBRE='" . $nombre . "' WHERE IDActividad=" . $IDActividad;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Actividad actualizada correctamente</strong></div>";
}

function eliminarActividad($IDActividad){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM Actividad WHERE IDActividad =" . $IDActividad;
	//echo $consultaOracle;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Actividad eliminada correctamente</strong></div>";
	
}

function buscarActividad($IDActividad){
	$actividad = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Actividad WHERE IDActividad =" . $IDActividad;
	//echo $consultaOracle;
	try{
		$actividades = $conexion -> query($consultaOracle);
		$actividad =  $actividades -> fetch();
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $actividad;
	
}

function listarActividades(){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM Actividad";
	
	$actividades = null;
	try{
		$actividades = $conexion -> query($query);
		$actividades -> execute();
		$actividades = $actividades->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $actividades;
}


?>