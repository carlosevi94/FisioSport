<?php
$idEntrenamiento = "";
if (isset($_GET['IDEntrenamiento'])) {
	$idEntrenamiento = $_GET['IDEntrenamiento'];
}
?>

<div class="panel panel-primary">
	<div class="panel-heading">

		<h3 class="panel-title"><strong>Listado de Entrenamiento Ejercicios</strong></h3>

	</div>
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th>Nombre</th>
					<th>Descripción del Ejercicio</th>
					<th></th>
					<th></th>
				</tr>
				<?php
				$entreje = listarEntrenamientoEjercicios($idEntrenamiento);

				foreach ($entreje as $registro) {
					$identre = $registro['IDENTRENAMIENTO'];
					$idactesp = $registro['IDACTIVIDADESPECIFICA'];
					$descripcion = $registro['DESCRIPCION'];
					$nombre = $registro['NOMBRE'];

					echo "<td>" . $nombre . "</td>";
					echo "<td>" . $descripcion . "</td>";

					if ($empleado) {
						echo "<td><a class=\"btn btn-success\" href=\"index.php?destino=gestionarEntrenamientoEjercicio&idEntrenamiento=" . $idEntrenamiento . "\">
									Añadir Actividad Específica</a>";
					}
					echo "</tr>";
				}
				?>
			</table>
		</div>
	</div>
</div>

