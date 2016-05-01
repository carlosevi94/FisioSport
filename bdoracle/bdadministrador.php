<?php


function comparaUsuarioClaveAdministrador($user, $pass) {
	$cliente = null;
	$conexion = CrearConexionBD();
	$consultaOracle = "SELECT * FROM ADMINISTRADOR  WHERE USUARIO ='" . $user . "' AND PASS='" . $pass . "'";

	try {
		$clientes = $conexion -> query($consultaOracle);
		$cliente = $clientes -> fetch();
	} catch(PDOException $e) {
	}

	CerrarConexionBD($conexion);

	return $cliente;
}


?>