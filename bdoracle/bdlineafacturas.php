<?php

function insertarLineaFactura($IDProducto,$IDCliente,$IDFactura,$PrecioCompra,$Unidades){
	$conexion = CrearConexionBD();
	
	$PrecioCompra = str_replace(",", ".", $PrecioCompra);
	
	$consultaOracle = "INSERT INTO LineaFactura (IDLineaFactura,IDProducto, IDCliente, IDFactura,PrecioCompra,Unidades) 
						VALUES(sec_lineafacturas.nextval,".$IDProducto."," . $IDCliente . ",".$IDFactura.",".$PrecioCompra.",".$Unidades.")";
	//echo $consultaOracle;
	try{
		$insertar = $conexion -> prepare($consultaOracle);
		$insertar -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Linea de factura eliminada correctamente</strong></div>";	

}

function actualizarLineaFactura($IDLineaFactura, $IDProducto,$IDCliente,$IDFactura,$PrecioCompra,$Unidades){
	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE LineaFactura SET IDProducto='" . $IDProducto . "',IDCliente='".$IDCliente."', IDFactura='".$IDFactura."', PrecioCompra='".$PrecioCompra."', Unidades='".$Unidades."'  WHERE IDLineaFactura=" . $IDLineaFactura;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Linea de factura actualizada correctamente</strong></div>";	
	
}

function eliminarLineaFactura($IDLineaFactura){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM LineaFactura WHERE IDLineaFactura =" . $IDLineaFactura;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Linea de factura eliminada correctamente</strong></div>";	
	
}

function buscarLineaFactura($IDLineaFactura){
	$lfact = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM LineaFactura WHERE IDLineaFactura =" . $IDLineaFactura;
	
	try{
		$lfacts = $conexion -> query($consultaOracle);
		$lfact =  $lfacts -> fetch();
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $lfact;
	
}

function listarLineaFactura($idFactura){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM LineaFactura INNER JOIN Productos ON LineaFactura.IDPRODUCTO = Productos.IDPRODUCTO WHERE LineaFactura.IDFACTURA = ".$idFactura;
	
	$lfacts = null;
	try{
		$lfacts = $conexion -> query($query);
		$lfacts -> execute();
		$lfacts = $lfacts->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $lfacts;
}


?>