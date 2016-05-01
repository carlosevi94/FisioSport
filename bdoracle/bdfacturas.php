<?php

function insertarFactura($IDCliente,$PrecioTotal){
	$conexion = CrearConexionBD();

	$consultaOracle = "INSERT INTO Facturas (IDFactura,IDCliente, PrecioTotal) 
						VALUES(sec_facturas.nextval,".$IDCliente."," . $PrecioTotal . ")";

	try{
		$insertar = $conexion -> prepare($consultaOracle);
		$insertar -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Factura registrada correctamente</strong></div>";	
	
}

function actualizarFactura($IDFactura,$IDCliente,$PrecioTotal){
	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE Facturas SET IDCliente='".$IDCliente."',PRECIOTOTAL='" . $PrecioTotal . "'  WHERE IDFactura=" . $IDFactura;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Factura actualizada correctamente</strong></div>";	
	
}

function eliminarFactura($IDFactura){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM Facturas WHERE IDFactura =" . $IDFactura;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

		return "<div class=\"alert alert-success\"><strong>Factura eliminada correctamente</strong></div>";	
	
}

function buscarFactura($IDFactura){
	$factura = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Facturas WHERE IDActividadEspecifica =" . $IDActividadEspecifica;
	
	try{
		$facturas = $conexion -> query($consultaOracle);
		$factura =  $facturas -> fetch();
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $factura;
	
}

function listarFactura(){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM Facturas";
	
	$facturas = null;
	try{
		$facturas = $conexion -> query($query);
		$facturas -> execute();
		$facturas = $facturas->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $facturas;
}


function listarFacturaDeCliente($idCliente){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM Facturas WHERE IDCLIENTE=".$idCliente;
	
	$facturas = null;
	try{
		$facturas = $conexion -> query($query);
		$facturas -> execute();
		$facturas = $facturas->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $facturas;
}



?>