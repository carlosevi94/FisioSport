<?php
function accederWeb($user, $pass) {
	$accesoConcedido = false;

	$result = comparaUsuarioClaveCliente($user, $pass);
	if ($result != null) {
		$_SESSION["user"] = $result;
		$_SESSION["perfil"] = "Cliente";
		$accesoConcedido = true;
	} else {
		$result = comparaUsuarioClaveEmpleado($user, $pass);
		if ($result != null) {
			$_SESSION["user"] = $result;
			$_SESSION["perfil"] = "Empleado";
			$accesoConcedido = true;
		} else {
			$result = comparaUsuarioClaveAdministrador($user, $pass);
			if ($result != null) {
				$_SESSION["user"] = "Administrador";
				$_SESSION["perfil"] = "Administrador";
				$accesoConcedido = true;
			}
		}
	}

	return $accesoConcedido;
}
?>