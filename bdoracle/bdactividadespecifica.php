<?php

function insertarActividadEspecifica($IDActividad,$nombre,$Descripcion){
	$conexion = CrearConexionBD();

	$consultaOracle = "INSERT INTO ActividadEspecifica (IDActividadEspecifica,IDActividad, Nombre, Descripcion) 
						VALUES(sec_actividadesespecifica.nextval,".$IDActividad.",'" . $nombre . "','".$Descripcion."')";


	try{
		$insertar = $conexion -> prepare($consultaOracle);
		$insertar -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Actividad Especifica registrada correctamente</strong></div>";
}

function actualizarActividadEspecifica($IDActividadEspecifica, $IDActividad,$nombre,$Descripcion){
	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE ActividadEspecifica SET IDACTIVIDAD='".$IDActividad."',NOMBRE='" . $nombre . "', DESCRIPCION='".$Descripcion."'  WHERE IDActividadEspecifica=" . $IDActividadEspecifica;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Actividad Especifica actualizada correctamente</strong></div>";
	
}



function eliminaActividadesEspecificasSegunActividad($IDActividad){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM ActividadEspecifica WHERE IDActividad =" . $IDActividad;
	//echo $consultaOracle;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Actividades Especificas asociadas a la Actividad eliminadas correctamente</strong></div>";
	
}


function eliminarActividadEspecifica($IDActividadEspecifica){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM ActividadEspecifica WHERE IDActividadEspecifica =" . $IDActividadEspecifica;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Actividad Especifica eliminada correctamente</strong></div>";
	
}

function buscarActividadEspecifica($IDActividadEspecifica){
	$actividad = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM ActividadEspecifica WHERE IDActividadEspecifica =" . $IDActividadEspecifica;
	
	try{
		$actividades = $conexion -> query($consultaOracle);
		$actividad =  $actividades -> fetch();
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $actividad;
	
}

function listarActividadesEspecifica(){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM ActividadEspecifica";
	
	$actividades = null;
	try{
		$actividades = $conexion -> query($query);
		$actividades -> execute();
		$actividades = $actividades->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $actividades;
}

function listarActividadesEspecificaSegunIDActividad($IDActividad){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM ActividadEspecifica WHERE IDACTIVIDAD=".$IDActividad;
	
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