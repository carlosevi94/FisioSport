<?php

function insertarEntrenamientoEjercicios($IDEntrenamiento,$IDActividadEspecifica){
	$conexion = CrearConexionBD();

	$consultaOracle = "INSERT INTO EntrenamientosEjercicios (IDEntrenamiento, IDActividadEspecifica) 
						VALUES(".$IDEntrenamiento."," . $IDActividadEspecifica . ")";
	
	try{
		$insertar = $conexion -> prepare($consultaOracle);
		$insertar -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Ejercicio de Entrenamiento registrado correctamente</strong></div>";
	
}

function actualizarEntrenamientoEjercicios($IDEntrenamiento,$IDActividadEspecifica){
	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE EntrenamientosEjercicios SET IDActividadEspecifica=".$IDActividadEspecifica." WHERE IDEntrenamiento=" . $IDEntrenamiento;
	
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Ejercicio de Entrenamiento actualizado correctamente</strong></div>";	
}

function eliminarEntrenamientoEjercicios($IDEntrenamiento){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM EntrenamientosEjercicios WHERE IDEntrenamiento =" . $IDEntrenamiento;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Ejercicio de Entrenamiento eliminado correctamente</strong></div>";	
	
}

function eliminarEntrenamientoEjerciciosSegunIdActividad($idACtividad){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM EntrenamientosEjercicios WHERE IDActividadEspecifica IN 
								(SELECT IDACTIVIDADESPECIFICA FROM  ACTIVIDADESPECIFICA WHERE IDACTIVIDAD =" . $idACtividad.")";
	//echo $consultaOracle;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Ejercicios de Entrenamientos asociados a la Actividad Seleccionada eliminados correctamente</strong></div>";	
	
}


function eliminarEntrenamientoEjerciciosSegunIdActividadEspecifica($idACtividadEspecifica){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM EntrenamientosEjercicios WHERE IDActividadEspecifica =" . $idACtividadEspecifica;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Ejercicios de Entrenamientos asociados a la Actividad Específica Seleccionada eliminados correctamente</strong></div>";	
	
}


function buscarEntrenamientoEjercicios($IDEntrenamiento){
	$enej = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM EntrenamientosEjercicios WHERE IDEntrenamiento =" . $IDEntrenamiento;
	
	try{
		$enejs = $conexion -> query($consultaOracle);
		$enej =  $enejs -> fetch();
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $enej;
	
}

function listarEntrenamientoEjercicios($idEntrenamiento){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM EntrenamientosEjercicios INNER JOIN Entrenamientos ON Entrenamientos.IDENTRENAMIENTO=EntrenamientosEjercicios.IDENTRENAMIENTO 
			INNER JOIN ActividadEspecifica ON ActividadEspecifica.IDACTIVIDADESPECIFICA = EntrenamientosEjercicios.IDACTIVIDADESPECIFICA
			WHERE EntrenamientosEjercicios.IDENTRENAMIENTO=".$idEntrenamiento;
	
	//echo $query;
	
	
	$enejs = null;
	try{
		$enejs = $conexion -> query($query);
		$enejs -> execute();
		$enejs = $enejs->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $enejs;
}

function listarEntrenamientoEjerciciosSegunIDCliente($IDCliente){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM EntrenamientosEjercicios ";
	
	$enejs = null;
	try{
		$enejs = $conexion -> query($query);
		$enejs -> execute();
		$enejs = $enejs->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $enejs;
}



?>