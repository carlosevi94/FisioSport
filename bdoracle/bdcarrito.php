<?php

function insertarCarrito($IDProducto,$IDCliente,$Unidades){
	$conexion = CrearConexionBD();

	$consultaOracle = "INSERT INTO Carrito (IDCarrito,IDProducto,IDCliente, Unidades) 
						VALUES(sec_carrito.nextval,'".$IDProducto."','" . $IDCliente . "','".$Unidades."')";

	try{
		$insertar = $conexion -> prepare($consultaOracle);
		$insertar -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Carrito registrado correctamente</strong></div>";
}

function actualizarCarrito($IDCarrito,$IDProducto,$IDCliente,$Unidades){
	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE Carrito SET IDCliente='".$IDCliente."',UNIDADES='" . $Unidades . "', IDProducto='" . $IDProducto."' WHERE IDCarrito=".$IDCarrito;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Carrito actualizado correctamente</strong></div>";
}


function actualizaUnidadesProducto($IDProducto,$IDCliente,$Unidades){
	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE Carrito SET UNIDADES=" . $Unidades . " WHERE IDCliente=".$IDCliente."AND IDPRODUCTO=".$IDProducto;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Unidades del producto actualizadas correctamente</strong></div>";
}

function listarCarritoSegunUsuarioYProducto($IDCliente,$IDProducto){
	$carrito = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Carrito WHERE IDCliente =" . $IDCliente." AND IDProducto=".$IDProducto;
	
	try{
		$productos = $conexion -> query($consultaOracle);
		$producto =  $productos -> fetch();
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $carrito;
}


function listaCarritoSegunUsuario($IDCliente){
	$carrito = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "select * from carrito inner join productos on carrito.IDPRODUCTO = productos.IDPRODUCTO WHERE IDCliente =" . $IDCliente;
	//echo $consultaOracle;
	try{
		$carritos = $conexion -> query($consultaOracle);
		$carritos -> execute();
		$carritos = $carritos->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $carritos;
	
}



function vaciaCarrito($IDCliente){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM Carrito WHERE IDCliente =" . $IDCliente;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	return "<div class=\"alert alert-success\"><strong>Carrito vaciado correctamente</strong></div>";
	
}

function eliminarCarrito($IDCarrito){
	$conexion = CrearConexionBD();
	$consultaOracle = "DELETE FROM Carrito WHERE IDCarrito =" . $IDCarrito;
	try{
		$delete = $conexion -> prepare($consultaOracle);
		$delete -> execute();
		}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Carrito eliminado correctamente</strong></div>";

}

function buscarCarrito($idProducto,$idcliente){
	$producto = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Carrito WHERE IDProducto =" . $idProducto. " AND IDCLIENTE = ".$idcliente;
	//echo $consultaOracle;
	try{
		$productos = $conexion -> query($consultaOracle);
		$producto =  $productos -> fetch();
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $producto;
	
}


function listarCarrito(){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM Carrito";
	
	$productos = null;
	try{
		$productos = $conexion -> query($query);
		$productos -> execute();
		$productos = $productos->fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return $productos;
}


?>