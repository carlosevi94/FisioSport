<?php
$idactividad = null;
if (isset($_GET['IDActividad'])) {
	$idactividad = $_GET['IDActividad'];
}

if(isset($_GET["borrar"]) && $_GET["borrar"]==1){
	$IDActividadEspecifica = $_GET["IDActividadEspecifica"];
	echo eliminarEntrenamientoEjerciciosSegunIdActividadEspecifica($IDActividadEspecifica);
	echo eliminarActividadEspecifica($IDActividadEspecifica);
}
?>


<div class="panel panel-primary">
	<div class="panel-heading">
	<?php
	
	
	if($idactividad==null){ ?>
					<h3 class="panel-title"><strong>Listado de Actividades Específicas</strong></h3>	
			<?php }else{
						$actividad=buscarActividad($idactividad);
						$nombreactividad=$actividad['NOMBRE'];
	?>
				<h3 class="panel-title"><strong>Listado de Actividades Específicas de la Actividad <?php echo $nombreactividad; ?></strong></h3>
	<?php			} ?>
				
	
		

	</div>
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th></th>
					<th></th>
				</tr>
				<?php

				if ($idactividad == null) {
					$actividadesesp = listarActividadesEspecifica();
				} else {
					$actividadesesp = listarActividadesEspecificaSegunIDActividad($idactividad);
				}

				foreach ($actividadesesp as $registro) {
					$nombre = $registro['NOMBRE'];
					$id = $registro['IDACTIVIDAD'];
					$idacesp = $registro['IDACTIVIDADESPECIFICA'];
					$descripcion = $registro['DESCRIPCION'];

					echo "<td>" . $nombre . "</td>";
					echo "<td>" . $descripcion . "</td>";

					if ($empleado) {
						echo "<td><a class=\"btn btn-success\" href=\"index.php?destino=gestionarActividadEspecifica&IDActividadEspecifica=" . $idacesp . "\">Editar Actividad Especifica</a>";
						echo "<td><a class=\"btn btn-danger\" href=\"index.php?destino=listarActividadesEspecificas&borrar=1&IDActividad=" . $idactividad."&IDActividadEspecifica=" . $idacesp . "\">Borrar Actividad Especifica</a>";

					}

					echo "</tr>";

				}
				?>
			</table>
		</div>
	</div>
</div>