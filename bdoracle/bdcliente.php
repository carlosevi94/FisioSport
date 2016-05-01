<?php

function insertarCliente($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechanamiciento, $direccion, $pass) {
	//Insertamos primero lo relativo a la persona
	insertarPersona($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechanamiciento, $direccion, $pass);

	$conexion = CrearConexionBD();

	$consultaOracle = "INSERT INTO Cliente (IDCliente, DNIPersona) 
						VALUES(sec_clientes.nextval,'" . $dni . "')";

	try {
		$insertar = $conexion -> prepare($consultaOracle);
		$insertar -> execute();
	} catch(PDOException $exception) {
	}

	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Cliente registrado correctamente</strong></div>";

}

function actualizarCliente($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechanamiciento, $direccion, $pass, $IDCliente) {
	//Actualizamos primero lo relativo a la Persona
	actualizarPersona($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechanamiciento, $direccion, $pass);

	$conexion = CrearConexionBD();

	$consultaOracle = "UPDATE Cliente SET DNIPersona='" . $dni . "' WHERE IDCliente=" . $IDCliente;
	try {
		$update = $conexion -> prepare($consultaOracle);
		$update -> execute();
	} catch(PDOException $exception) {
	}

	CerrarConexionBD($conexion);

	return "<div class=\"alert alert-success\"><strong>Cliente actualizado correctamente</strong></div>";

}

function buscarCliente($IDCliente) {
	$cliente = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Cliente INNER JOIN Persona ON Cliente.DNIPersona = Persona.DNI WHERE IDCliente =" . $IDCliente;

	try {
		$clientes = $conexion -> query($consultaOracle);
		$cliente = $clientes -> fetch();
	} catch(PDOException $e) {
	}

	CerrarConexionBD($conexion);

	return $cliente;
}


function buscarClientePorDni($dni) {
	$cliente = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Cliente INNER JOIN Persona ON Cliente.DNIPersona = Persona.DNI WHERE DNIPersona ='" . $dni."'";

	
	try {
		$clientes = $conexion -> query($consultaOracle);
		$cliente = $clientes -> fetch();
	} catch(PDOException $e) {
	}

	CerrarConexionBD($conexion);

	return $cliente;
}







function comparaUsuarioClaveCliente($user, $pass) {
	$cliente = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM Cliente INNER JOIN Persona ON Cliente.DNIPersona = Persona.DNI WHERE DNI ='" . $user . "' AND PASS='" . $pass . "'";
	//echo $consultaOracle;

	try {
		$clientes = $conexion -> query($consultaOracle);
		$cliente = $clientes -> fetch();
	} catch(PDOException $e) {
	}

	CerrarConexionBD($conexion);

	if ($cliente)
		return $cliente["DNI"];
	else
		return null;
}

function listarCliente() {
	$conexion = CrearConexionBD();

	$query = "SELECT * FROM Cliente INNER JOIN Persona ON Cliente.DNIPersona = Persona.DNI";

	$clientes = null;
	try {
		$clientes = $conexion -> query($query);
		$clientes -> execute();
		$clientes = $clientes -> fetchAll(PDO::FETCH_ASSOC);
	} catch(PDOException $exception) {
	}

	CerrarConexionBD($conexion);

	return $clientes;

}
?>