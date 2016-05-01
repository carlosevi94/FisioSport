<?php

function insertarEntrenamiento($IDCliente,$FechaInicio,$FechaFin,$IDActividad,$Descripcion){
	$conexion = CrearConexionBD();

	$consultaOracle = "INSERT INTO Entrenamientos (IDEntrenamiento,IDCliente, FechaInicio, FechaFin,IDActividad,Descripcion) 
						VALUES(sec_entrenamientos.nextval,".$IDCliente.",to_date('".$FechaInicio."','DD/MM/RR'), to_date('".$FechaFin."','DD/MM/RR'),".$IDActividad.",'".$Descripcion."')";
	
	
	
	try{
		$insertar = $conexion -> prepare($consultaOracle);
		$insertar -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Entrenamiento registrado correctamente</strong></div>";
	
}

function actualizarEntrenamiento($IDEntrenamiento, $IDCliente,$FechaInicio,$FechaFin,$IDActividad,$Descripcion){
	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE Entrenamientos SET IDCliente='".$IDCliente."',FECHAINICIO=to_date('".$FechaInicio."','DD/MM/RR'), FECHAFIN=to_date('".$FechaFin."','DD/MM/RR'), IDACTIVIDAD='".$IDActividad."', DESCRIPCION='".$Descripcion."'  WHERE IDEntrenamiento=" . $IDEntrenamiento;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Entrenamiento actualizado correctamente</strong></div>";
}

function eliminarEntrenamiento($IDEntrenamiento){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM Entrenamientos WHERE IDEntrenamiento =" . $IDEntrenamiento;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Entrenamiento eliminada correctamente</strong></div>";
}


function eliminarEntrenamientoSegunActividad($IDActividad){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM Entrenamientos WHERE IDActividad =" . $IDActividad;
	//echo $consultaOracle;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Entrenamientos asociados a la Actividad seleccionada, eliminados correctamente</strong></div>";
}


function buscarEntrenamiento($IDEntrenamiento){
	$entrenamiento = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Entrenamientos WHERE IDEntrenamiento =" . $IDEntrenamiento;
	
	try{
		$entrenamientos = $conexion -> query($consultaOracle);
		$entrenamiento =  $entrenamientos -> fetch();
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $entrenamiento;
	
}

function listarEntrenamiento(){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM Entrenamientos INNER JOIN Cliente ON Entrenamientos.IDCLIENTE = Cliente.IDCLIENTE INNER JOIN Persona ON 
				Cliente.DNIPERSONA = Persona.DNI";
	
	$entrenamientos = null;
	try{
		$entrenamientos = $conexion -> query($query);
		$entrenamientos -> execute();
		$entrenamientos = $entrenamientos->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $entrenamientos;
}

function listarEntrenamientoSegunCliente($IDCliente){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM Entrenamientos WHERE IDCliente=".$IDCliente;
	
	$entrenamientos = null;
	try{
		$entrenamientos = $conexion -> query($query);
		$entrenamientos -> execute();
		$entrenamientos = $entrenamientos->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $entrenamientos;
}


?>