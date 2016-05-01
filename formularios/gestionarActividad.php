<?php 

$nombre = null;
$todoOK = false;
$actividad="";

$idActividad = null;
$edicion = false;

if(isset($_GET['IDActividad'])){
	$idActividad = $_GET['IDActividad'];
	$edicion = true;
	
	$actividadCompleta = buscarActividad($idActividad);
	$actividad = $actividadCompleta['NOMBRE'];
}

if(isset($_POST["nombre"])){

	if(isset($_POST["nombre"])) 
		$actividad = $_POST['nombre'];
	if(isset($_POST["IDActividad"])) {
		$idActividad = $_POST['IDActividad'];
		$edicion = true;
	}
	$erroresValidacionPHP = checkTablaActividad($actividad);
	
	if ($erroresValidacionPHP == "") {
		if($edicion){
			echo actualizarActividad($idActividad, $actividad);
			$todoOK = true;
		}else{
			echo insertarActividad($actividad);
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
		<h3 class="panel-title"><strong>Gestionar Actividad</strong></h3>
	</div>
	<div class="panel-body">
		<form  ID="formulario" name="registro"  action="index.php?destino=gestionarActividad" method="post">
			<?php if($edicion){ ?>
				<input id="IDActividad" name="IDActividad"  type="hidden" value="<?php echo $idActividad;?>"/>
			<?php }?>
			<div  class="form-group">
				<label for="nombre" id="nombre">Actividad:</label>
				<input id="nombre" class="form-control"  name="nombre" id="nombre" type="text" size="50" value="<?php echo $actividad; ?>">
				</input>
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
        message: 'Valor no válido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
			nombre:{
			    validators:{
            		notEmpty:{
            			message: "Debe rellenar el nombre de la Actividad"
            		},
            		stringLength: {
                        max: 50,
                        message: "La cadena no debe superar los 50 caracteres."
                    }
            		
            	}
			    
			}          
        }
    });
});
</script>