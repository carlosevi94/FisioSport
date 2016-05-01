<div class="panel panel-primary">
	<div class="panel-heading">

		<h3 class="panel-title"><strong>Listado de Entrenamientos</strong></h3>

	</div>
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th>Descripcion</th>
					<th>Fecha de Inicio</th>
					<th>Fecha de Fin</th>
					<th>Cliente</th>
					<th></th>
				</tr>
				<?php
				$entrenamientos = listarEntrenamiento();

				foreach ($entrenamientos as $registro) {
					$IDEntrenamiento = $registro['IDENTRENAMIENTO'];
					$IDCliente = $registro['IDCLIENTE'];
					$FechaInicio = $registro['FECHAINICIO'];
					$FechaFin = $registro['FECHAFIN'];
					$IDActividad = $registro['IDACTIVIDAD'];
					$Descripcion = $registro['DESCRIPCION'];

					$persona = buscarCliente($IDCliente);
					$nomper = $persona['NOMBRE'];

					echo "<td>" . $Descripcion . "</td>";
					echo "<td>" . $FechaInicio . "</td>";
					echo "<td>" . $FechaFin . "</td>";
					echo "<td>" . $nomper . "</td>";

					if ($empleado) {
						echo "<td><a class=\"btn btn-success\" href=\"index.php?destino=gestionarEntrenamiento2&IDEntrenamiento=" . $IDEntrenamiento . "\">Editar Entrenamiento</a>";

					}

					echo "</tr>";

				}
				?>
			</table>
		</div>
	</div>
	<div class="panel-body">
		
		
		<a class="btn btn-primary" href="index.php?destino=gestionarEntrenamiento">Nuevo Entrenamiento</a>;
		
	</div>
</div>

