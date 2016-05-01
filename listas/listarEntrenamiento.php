<?php
$idcliente = null;
if (isset($_GET['idcliente'])) {
	$idcliente = $_GET['idcliente'];
}
?>






<div class="panel panel-primary">
	<div class="panel-heading">



<?php 	if($idcliente==null){ ?>
	
	
					<h3 class="panel-title"><strong>Listado de Entrenamientos</strong></h3>	
			
			<?php }else{
				
						$cliente=buscarCliente($idcliente);
						$nombrecliente=$cliente['NOMBRE'];
			?>
				<h3 class="panel-title"><strong>Listado de Entrenamientos de  <?php echo $nombrecliente; ?> </strong></h3>
			<?php } ?>








	</div>
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th>Nombre:</th>
					<th>Fecha de Inicio:</th>
					<th>Fecha de Fin:</th>
					<th></th>
				</tr>
				<?php
				if($cliente){
					$entrenamiento = listarEntrenamientoSegunCliente($idcliente);
				}
				if($empleado){
					$entrenamiento = listarEntrenamiento();
				}
				

				foreach ($entrenamiento as $registro) {
					$identrenamiento = $registro['IDENTRENAMIENTO'];
					$idCliente = $registro['IDCLIENTE'];
					$idcliente = $registro['IDCLIENTE'];
					$fechaInicio = $registro['FECHAINICIO'];
					$fechaFin = $registro['FECHAFIN'];
					$idactividad = $registro['IDACTIVIDAD'];
					$descripcion = $registro['DESCRIPCION'];

					echo "<td>" . $descripcion . "</td>";
					echo "<td>" . $fechaInicio . "</td>";
					echo "<td>" . $fechaFin . "</td>";

					if ($empleado) {
						echo "<td><a class=\"btn btn-success\" href=\"index.php?destino=gestionarEntrenamiento&IDEntrenamiento=" . $identrenamiento . "\">Editar Entrenamiento</a>";
					}
					
					echo "<td><a class=\"btn btn-primary\" href=\"index.php?destino=listarEntramientoEjercicios&IDEntrenamiento=" . $identrenamiento . "\">Ver Entrenamientos Específicos</a>";

					echo "</tr>";

				}
				?>
			</table>
		</div>
	</div>
	
	
<?php if($cliente && isset($identrenamiento)){
					$cliente=buscarCliente($idcliente);
					$nombrecliente=$cliente['NOMBRE'];
			?>
	
	<div class="panel-heading">
		<h3 class="panel-title"><strong>Listado de Ejercicios del Entrenamiento Actual para <?php echo $nombrecliente; ?></strong></h3>
	</div>
	
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					
					<th>Descripción del Ejercicio</th>
				</tr>
				
				<?php
				$entreejer = listarEntrenamientoEjercicios($identrenamiento);

				foreach ($entreejer as $registro) {
					$identre = $registro['IDENTRENAMIENTO'];
					$idactesp = $registro['IDACTIVIDADESPECIFICA'];
					$descripcion = $registro['DESCRIPCION'];

					echo "<td>" . $descripcion . "</td>";

					if ($empleado) {
						//echo "<td><a class=\"btn btn-success\" href=\"index.php?destino=gestionarX&campo2=" . $campo2 . "\">Editar X</a>";

					}
					echo "</tr>";

				}
				
				
				?>
			</table>
		</div>
	</div>
	
	<?php } ?>
</div>

