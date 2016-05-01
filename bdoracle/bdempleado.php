<?php

function insertarEmpleado($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechanamiciento, $direccion, $pass) {
	//Insertamos primero lo relativo a la persona
	insertarPersona($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechanamiciento, $direccion, $pass);

	$conexion = CrearConexionBD();

	$consultaOracle = "INSERT INTO Empleado (IDEmpleado, DNIPersona) 
						VALUES(sec_empleados.nextval,'" . $dni . "')";

	try {
		$insertar = $conexion -> prepare($consultaOracle);
		$insertar -> execute();
	} catch(PDOException $exception) {
	}

	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Empleado registrado correctamente</strong></div>";
}

function actualizarEmpleado($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechanamiciento, $direccion, $pass, $IDEmpleado) {
	//Actualizamos primero lo relativo a la Persona
	actualizarPersona($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechanamiciento, $direccion, $pass);

	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE Empleado SET DNIPersona='" . $dni . "' WHERE IDEmpleado=" . $IDEmpleado;
	try {
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	} catch(PDOException $exception) {
	}

	CerrarConexionBD($conexion);
	
	return "<div class=\"alert alert-success\"><strong>Empleado actualizado correctamente</strong></div>";
}

function buscarEmpleado($IDEmpleado) {
	$empleado = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Empleado INNER JOIN Persona ON Empleado.DNIPersona = Persona.DNI WHERE IDEmpleado =" . $IDEmpleado;

	try {
		$empleados = $conexion -> query($consultaOracle);
		$empleado = $empleados -> fetch();
	} catch(PDOException $e) {
	}

	CerrarConexionBD($conexion);

	return $empleado;
}

function comparaUsuarioClaveEmpleado($user, $pass) {
	$empleado = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Persona INNER JOIN Empleado ON Empleado.DNIPersona = Persona.DNI WHERE DNI ='" . $user . "' AND PASS='" . $pass . "'";
	//echo $consultaOracle;
	try {
		$empleados = $conexion -> query($consultaOracle);
		$empleado = $empleados -> fetch();
	} catch(PDOException $e) {
	}

	CerrarConexionBD($conexion);
	if($empleado)
		return $empleado["DNI"];
	else
		return null;
}

function listarEmpleado() {
	$conexion = CrearConexionBD();

	$query = "SELECT * FROM Empleado INNER JOIN Persona ON Empleado.DNIPersona = Persona.DNI WHERE BAJA=0";

	$empleados = null;
	try {
		$empleados = $conexion -> query($query);
		$empleados -> execute();
		$empleados = $empleados -> fetchAll(PDO::FETCH_ASSOC);
	} catch(PDOException $exception) {
	}

	CerrarConexionBD($conexion);

	return $empleados;

}
?>