<?php
    
    
    function insertarProducto($Nombre, $Descripcion, $Precio, $Stock, $Foto){
    	$conexion= CrearConexionBD();
		
		$consultaOracle = "INSERT INTO Productos (IDProducto, Nombre, Descripcion, Precio, Stock, Foto) 	
		VALUES(sec_productos.nextval,'".$Nombre."','".$Descripcion."',".$Precio.",".$Stock.",'".$Foto."')";
		echo $consultaOracle;
		
		try{
			$insertar = $conexion -> prepare($consultaOracle);
			$insertar -> execute();
		} catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Producto registrado correctamente</strong></div>";	
		
    }
    
    
    function actualizaStock($IDProducto, $Stock){
    $conexion = CrearConexionBD();

	$consultaOracle = "UPDATE Productos SET Stock=".$Stock." WHERE IDProducto=".$IDProducto;
	
	//echo $consultaOracle;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Stock del producto actualizado correctamente</strong></div>";	

    }
    
function actualizarProducto($IDProducto, $Nombre, $Descripcion, $Precio, $Stock, $Foto){
	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE Productos SET Nombre='" .$Nombre."', Descripcion='".$Descripcion."', Precio=".$Precio.", Stock=".$Stock.", Foto='" .$Foto."' WHERE IDProducto=".$IDProducto;
	//echo $consultaOracle;
	try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Producto actualizado correctamente</strong></div>";	
}


function buscarProducto($IDProducto){
	$producto = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Productos WHERE IDProducto =" . $IDProducto;
	
	try{
		$productos = $conexion -> query($consultaOracle);
		$producto =  $productos -> fetch();
		}catch(PDOException $e){}
	
	CerrarConexionBD($conexion);
	
	return $producto;
	
}

function listarProductos(){
	$conexion = CrearConexionBD();
	$query = "SELECT * FROM Productos";
	
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