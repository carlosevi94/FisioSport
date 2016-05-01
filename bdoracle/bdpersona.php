<?php
    

    function insertarPersona($nombre,$apellidos,$dni,$email,$sexo,$telefono,$fechanamiciento,$direccion,$pass){
    	$conexion= CrearConexionBD();
		
		$consultaOracle = "INSERT INTO Persona (Nombre, Apellidos, DNI,Email,Sexo,Telefono,FechaNacimiento,Direccion,pass,Baja) 
						VALUES('". $nombre ."','".$apellidos."','".$dni."','".$email."','".$sexo."','".$telefono."',
						to_date('".$fechanamiciento."','DD/MM/RR'),'".$direccion."','".$pass."',0)";
		//echo $consultaOracle;
		
		try{
			$insertar = $conexion -> prepare($consultaOracle);
			$insertar -> execute();
		} catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	//echo mensajeExito("Persona registrada correctamente");
		
    }
    
    
    function actualizarPersona($nombre,$apellidos,$dni,$email,$sexo,$telefono,$fechanamiciento,$direccion,$pass){
    	$conexion= CrearConexionBD();
		
		$consultaOracle = "UPDATE Persona SET NOMBRE='". $nombre ."', APELLIDOS='" .$apellidos."', EMAIL='".$email."',
								 SEXO='".$sexo."', TELEFONO='".$telefono."', FechaNacimiento=to_date('".$fechanacimiento."','DD/MM/RR'), 
								 DIRECCION='".$direccion."', PASS='" .$pass."' WHERE DNI=".$dni;
		try{
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	}catch(PDOException $exception){}
	
	CerrarConexionBD($conexion);

	//echo mensajeExito("Persona actualizada correctamente");
		
    }
    
    
    function borrarPersona($dni){
    	$conexion= CrearConexionBD();
		
		$consultaOracle = "UPDATE Persona SET BAJA=1 WHERE DNI='".$dni."'";
		try{
			$update = $conexion -> prepare($consultaOracle);
			$update -> execute();
		}catch(PDOException $exception){}
	
		CerrarConexionBD($conexion);

		return "<div class=\"alert alert-success\"><strong>Dado de Baja correctamente</strong></div>";

    }
    
    function reactivarPersona($dni){
    	$conexion= CrearConexionBD();
		
		$consultaOracle = "UPDATE Persona SET BAJA=0 WHERE DNI='".$dni."'";
		try{
			$update = $conexion -> prepare($consultaOracle);
			$update -> execute();
		}catch(PDOException $exception){}
	
		CerrarConexionBD($conexion);

		return "<div class=\"alert alert-success\"><strong>Dado de Alta correctamente</strong></div>";

    }
    
    function buscarPersona($dni){
    	$persona=null;
		$conexion = CrearConexionBD();
		$consultaOracle = "SELECT * FROM Persona WHERE DNI =" . $dni;
	
		try{
			$personas = $conexion -> query($consultaOracle);
			$persona =  $personas -> fetch();
		}catch(PDOException $e){}
	
		CerrarConexionBD($conexion);
	
		return $persona;
    }
	
	function listarPersona(){
		$conexion = CrearConexionBD();
		
		
		$query = "SELECT * FROM Persona";
	
		$personas = null;
		try{
			$personas = $conexion -> query($query);
			$personas -> execute();
			$personas = $personas->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $exception){}
	
		CerrarConexionBD($conexion);
	
		return $personas;
			
			
	}
    
?>