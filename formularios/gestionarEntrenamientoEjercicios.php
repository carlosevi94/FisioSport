<?php 

$campo1 = null;
$todoOK = false;
$IDEntrenamiento="";$IDActividadEspecifica="";
if(isset($_POST["IDENTRENAMIENTO"])){

	if(isset($_POST["IDENTRENAMIENTO"])) 
		$IDEntrenamiento = $_POST['IDENTRENAMIENTO'];
	if(isset($_POST["IDACTIVIDADESPECIFICA"])) 
		$IDActividadEspecifica = $_POST['IDACTIVIDADESPECIFICA'];
	
	$erroresValidacionPHP = checkTablaEntrenamientoEjericios($IDEntrenamiento, $IDActividadEspecifica);
	
	if ($erroresValidacionPHP == "") {
		echo insertarEntrenamientoEjercicios($IDEntrenamiento, $IDActividadEspecifica);
		$todoOK = true;
	} else {
		echo "<div class=\"alert alert-danger\"><strong>".$erroresValidacionPHP."</strong></div>";
	}
}
if($todoOK == false){
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"><strong>Gestionar Ejercicios en los entrenamientos</strong></h3>
	</div>
	<div class="panel-body">
		<form  ID="formulario" name="registro"  action="index.php?destino=gestionarEntrenamientoEjercicios" method="post">
			<div  class="form-group">
				<label for="IDENTRENAMIENTO" id="IDENTRENAMIENTO">Entrenamiento: </label>
				<select class="form-control"  name="IDENTRENAMIENTO">    
				
				<?php 
				
				$entrenamiento=listarEntrenamiento();
				foreach ($entrenamiento as $registro) {
					$IDEntrenamiento=$registro['IDENTRENAMIENTO'];
					$nombre=$registro['DESCRIPCION']; ?>
					
					<option value=<?php echo $IDEntrenamiento; ?>><?php echo $nombre; ?></option>
					
				<?php } 
				?>
      				
   				</select>
			</div>
			<br />
			
			<div  class="form-group">
				<label for="IDACTIVIDADESPECIFICA" id="IDACTIVIDADESPECIFICA">Actividad especifica: </label>
				<select class="form-control"  name="IDACTIVIDADESPECIFICA">    
				
				<?php 
				
				$actividades=listarActividadesEspecifica();
				foreach ($actividades as $registro) {
					$IDActividad=$registro['IDACTIVIDADESPECIFICA'];
					$nombre=$registro['NOMBRE']; ?>
					
					<option value=<?php echo $IDActividad; ?>><?php echo $nombre; ?></option>
					
				<?php } 
				?>
      				
   				</select>
			</div>
			<br />
			
			
			<div  class="form-group">
				<input type="submit" class="btn btn-success btn-mg" value="Aceptar" />
			</div>
		</form>
	</div>
</div>
<?php } ?>

