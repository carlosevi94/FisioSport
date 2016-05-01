<?php
if(isset($_GET["borrar"]) && $_GET["borrar"]==1){
	$idActividad = $_GET["IDActividad"];
	echo eliminarEntrenamientoEjerciciosSegunIdActividad($idActividad);
	echo eliminarEntrenamientoSegunActividad($idActividad);
	echo eliminaActividadesEspecificasSegunActividad($idActividad);
	echo eliminarActividad($idActividad);
}
?>

<div class="panel panel-primary">
	<div class="panel-heading">

		<h3 class="panel-title"><strong>Listado de Actividades</strong></h3>

	</div>
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th>Nombre</th>
					<th></th>
					<th></th>
				</tr>
				<?php
				$actividades = listarActividades();

				foreach ($actividades as $registro) {
					$nombre = $registro['NOMBRE'];
					$id = $registro['IDACTIVIDAD'];

					echo "<td>" . $nombre . "</td>";

					if ($empleado) {
						echo "<td><a class=\"btn btn-primary\" href=\"index.php?destino=listarActividadesEspecificas&IDActividad=" . $id . "\">Ver Actividades Específicas</a>";
						echo "<td><a class=\"btn btn-success\" href=\"index.php?destino=gestionarActividad&IDActividad=" . $id . "\">Editar Actividad</a>";
						echo "<td><a class=\"btn btn-danger\" href=\"index.php?destino=listaractividades&borrar=1&IDActividad=" . $id . "\">Borrar Actividad</a>";
						
					}
					echo "</tr>";
				}
				?>
			</table>
		</div>
	</div>
</div>

