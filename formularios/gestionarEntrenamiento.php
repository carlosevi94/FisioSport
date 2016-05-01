<?php 

$todoOK = false;
$edicion=false;

$IDEntrenamiento=null;
$IDCliente="";$FechaInicio="";$FechaFin="";$IDActividad="";$Descripcion="";


if(isset($_GET['IDEntrenamiento'])){
	$IDEntrenamiento = $_GET['IDEntrenamiento'];
	$edicion = true;
	
	$entrenamientocompleto = buscarEntrenamiento($IDEntrenamiento);
	$IDCliente = $entrenamientocompleto['IDCLIENTE'];
	$FechaInicio= $entrenamientocompleto['FECHAINICIO'];
	$FechaFin= $entrenamientocompleto['FECHAFIN'];
	$IDActividad= $entrenamientocompleto['IDACTIVIDAD'];
	$Descripcion= $entrenamientocompleto['DESCRIPCION'];
}




if(isset($_POST["idActividad"])){

	/*if(isset($_POST["IDEntrenamiento"])) 
		$IDEntrenamiento = $_POST['IDEntrenamiento'];*/
	if(isset($_POST["idcliente"])) 
		$IDCliente = $_POST['idcliente'];
	if(isset($_POST["fechainicio"])) 
		$FechaInicio = $_POST['fechainicio'];
	if(isset($_POST["fechafin"])) 
		$FechaFin = $_POST['fechafin'];
	if(isset($_POST["idActividad"])) 
		$IDActividad = $_POST['idActividad'];
	if(isset($_POST["nombre"])) 
		$Descripcion = $_POST['nombre'];
	if(isset($_POST["IDEntrenamiento"])) {
		$edicion = true;
		$IDEntrenamiento=$_POST['IDEntrenamiento'];
	}
	
	$erroresValidacionPHP = checkTablaEntrenamientos($IDEntrenamiento, $IDCliente, $FechaInicio, $FechaFin, $IDActividad, $Descripcion);
	
	if ($erroresValidacionPHP == "") {
			if($edicion){
			echo actualizarEntrenamiento($IDEntrenamiento, $IDCliente, $FechaInicio, $FechaFin, $IDActividad, $Descripcion);
			$todoOK = true;
		}else{
			echo insertarEntrenamiento($IDCliente, $FechaInicio, $FechaFin, $IDActividad, $Descripcion);
			$todoOK = true;
		}
		
	
		
		
	} else {
		echo "<div class=\"alert alert-danger\"><strong>".$erroresValidacionPHP."</strong></div>";
	}
}
if($todoOK == false){
?>

<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><strong>Gestionar Entrenamientos</strong></h3>
</div>
<div class="panel-body">
<form  ID="formulario" name="registro"  action="index.php?destino=gestionarEntrenamiento" method="post">
<?php if($edicion){
?>
<input id="IDEntrenamiento" name="IDEntrenamiento"  type="hidden" value="<?php echo $IDEntrenamiento; ?>"/>
<?php } ?>

<div  class="form-group">
<label for="nombre" id="nombre">Nombre :</label>
<input id="nombre" class="form-control"  name="nombre" id="nombre" type="text" size="255" value="<?php echo $Descripcion; ?>">
</input>
</div>
<div  class="form-group">
<label for="idcliente" id="idcliente">Cliente :</label>

<select class="form-control" name="idcliente">

<?php

$clientes=listarCliente();
foreach ($clientes as $registro) {
$IDCliente=$registro['IDCLIENTE'];
$nombre=$registro['NOMBRE'];
?>

<option value=<?php echo $IDCliente; ?>><?php echo $nombre; ?></option>

<?php } ?>

</select>

</div>
<br />

<div  class="form-group">
<label for="fechainicio" id="fechainicio">Fecha de Inicio :</label>
<input id="fechainicio" class="form-control"  name="fechainicio" id="fechainicio" type="text" size="15" value="<?php echo $FechaInicio; ?>">
</input>
</div>
<br />

<div  class="form-group">
<label for="fechafin" id="fechafin">Fecha de Fin :</label>
<input id="fechafin" class="form-control"  name="fechafin" id="fechafin" type="text" size="15" value="<?php echo $FechaFin; ?>">
</input>
</div>
<br />

<div  class="form-group">
<label for="idActividad" id="idActividad">Actividad :</label>

<select  class="form-control" name="idActividad">

<?php

$actividades=listarActividades();
foreach ($actividades as $registro) {
$IDActividad=$registro['IDACTIVIDAD'];
$nombre=$registro['NOMBRE'];
?>

<option value=<?php echo $IDActividad; ?>><?php echo $nombre; ?></option>

<?php } ?>

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

<script type="text/javascript">
	$(document).ready(function() {
		$('#formulario').bootstrapValidator({
			message : 'Valor no válido',
			feedbackIcons : {
				valid : 'glyphicon glyphicon-ok',
				invalid : 'glyphicon glyphicon-remove',
				validating : 'glyphicon glyphicon-refresh'
			},
			fields : {
				nombre : {
					validators : {
						notEmpty : {
							message : "Debe rellenar el nombre"
						},
						stringLength : {
							max : 255,
							message : "La cadena no debe superar los 255 caracteres."
						}

					}

				},
				fechainicio : {
					validators : {
						notEmpty : {
							message : "Debe rellenar la fecha de Inicio"
						},
						stringLength : {
							max : 20,
							message : "Fecha demasiado larga. Formato: DD/MM/AAAA"
						}

					}

				},
				fechafin : {
					validators : {
						notEmpty : {
							message : "Debe rellenar la fecha de Fin"
						},
						stringLength : {
							max : 20,
							message : "Fecha demasiado larga. Formato: DD/MM/AAAA"
						}

					}

				}

			}
		});
	}); 
</script>