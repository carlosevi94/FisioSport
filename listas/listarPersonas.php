<?php

$escliente = 0;
$esempleado = 0;

if (isset($_GET['cliente'])) {
	$escliente = $_GET['cliente'];
}

if (isset($_GET['empleado'])) {
	$esempleado = $_GET['empleado'];
}

if (isset($_GET['baja']) && isset($_GET['dni'])) {
	$baja = $_GET['baja'];
	$dni = $_GET['dni'];

	if ($baja == 1) {
		echo borrarPersona($dni);
	} else
		echo reactivarPersona($dni);
}
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<?php
if($escliente==1){
		?>
		<h3 class="panel-title"><strong>Listado de Clientes</strong></h3>
		<?php } else if($esempleado==1){ ?>
		<h3 class="panel-title"><strong>Listado de Empleados</strong></h3>
		<?php } ?>
	</div>

	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>DNI</th>
					<th>Email</th>
					<th>Sexo</th>
					<th>Telefono</th>
					<th>Fecha de Nacimiento</th>
					<th>Direccion</th>
					<th>Password</th>
					<th>Baja</th>
					<th></th>
					<th></th>
				</tr>
				<?php
				if ($escliente == 1) {
					$personas = listarCliente();
				} else if ($esempleado == 1) {
					$personas = listarEmpleado();
				}

				foreach ($personas as $registro) {

					if ($escliente == 1) {
						$idcliente = $registro['IDCLIENTE'];
					} else if ($esempleado == 1) {
						$idempleado = $registro['IDEMPLEADO'];
					}

					$nombre = $registro['NOMBRE'];
					$apellidos = $registro['APELLIDOS'];

					$dni = $registro['DNI'];
					$email = $registro['EMAIL'];
					$sexo = $registro['SEXO'];
					$telefono = $registro['TELEFONO'];
					$fechanac = $registro['FECHANACIMIENTO'];
					$direccion = $registro['DIRECCION'];
					$pass = $registro['PASS'];
					$baja = $registro['BAJA'];

					echo "<td>" . $nombre . "</td>";
					echo "<td>" . $apellidos . "</td>";
					echo "<td>" . $dni . "</td>";
					echo "<td>" . $email . "</td>";
					if ($sexo == "H") {
						echo "<td>Hombre</td>";
					} else {
						echo "<td>Mujer</td>";
					}

					echo "<td>" . $telefono . "</td>";
					echo "<td>" . $fechanac . "</td>";
					echo "<td>" . $direccion . "</td>";
					echo "<td>" . $pass . "</td>";

					if ($baja == 0) {
						echo "<td>No</td>";
					} else {
						echo "<td>Si</td>";
					}

					if ($escliente == 1) {
						echo "<td><a class=\"btn btn-primary\" href=\"index.php?destino=gestionPersonas&idcliente=" . $idcliente . "\">Modificar</a>";

					} else if ($esempleado == 1) {
						echo "<td><a class=\"btn btn-primary\" href=\"index.php?destino=gestionPersonas&idempleado=" . $idempleado . "\">Modificar</a>";

					}

					if ($empleado) {
						if ($escliente == 1) {
							if ($baja == 0) {
								echo "<td><a class=\"btn btn-warning\" href=\"index.php?destino=listarpersonas&cliente=1&baja=1&dni=" . $dni . "\">Dar de Baja</a>";
							} else if ($baja == 1) {
								echo "<td><a class=\"btn btn-warning\" href=\"index.php?destino=listarpersonas&cliente=1&baja=0&dni=" . $dni . "\">Dar de Alta</a>";
							}
						} else if ($esempleado == 1) {
							if ($baja == 0) {
								echo "<td><a class=\"btn btn-warning\" href=\"index.php?destino=listarpersonas&empleado=1&baja=1&dni=" . $dni . "\">Dar de Baja</a>";
							} else if ($baja == 1) {
								echo "<td><a class=\"btn btn-warning\" href=\"index.php?destino=listarpersonas&empleado=1&baja=0&dni=" . $dni . "\">Dar de Alta</a>";
							}
						}

					}
					
					

					echo "</tr>";
				}
				?>
			</table>
		</div>
	</div>
</div>

