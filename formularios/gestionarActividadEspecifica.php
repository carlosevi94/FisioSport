<?php 


$todoOK = false;
$edicion=false;
$idActividadespecifica=null;
$IDActividad="";$Nombre="";$Descripcion="";



if(isset($_GET['IDActividadEspecifica'])){
	$idActividadespecifica = $_GET['IDActividadEspecifica'];
	$edicion = true;
	
	$actividadCompleta = buscarActividadEspecifica($idActividadespecifica);
	$IDActividad = $actividadCompleta['IDACTIVIDAD'];
	$Nombre=$actividadCompleta['NOMBRE'];
	$Descripcion=$actividadCompleta['DESCRIPCION'];
	
	
}



if(isset($_POST["nombre"])){
	if(isset($_POST["IDACTIVIDAD"])) 
		$IDActividad = $_POST['IDACTIVIDAD'];
	if(isset($_POST["nombre"])) 
		$Nombre = $_POST['nombre'];
	if(isset($_POST["descripcion"])) 
		$Descripcion = $_POST['descripcion'];
	if(isset($_POST["IDActividadEspecifica"])) {
		$idActividadespecifica = $_POST['IDActividadEspecifica'];
		$edicion = true;
	}
	
	
	$erroresValidacionPHP = checkTablaActividadEspecifica($IDActividad, $Nombre, $Descripcion);
	
	if ($erroresValidacionPHP == "") {
		if($edicion){
			echo actualizarActividadEspecifica($idActividadespecifica, $IDActividad, $Nombre, $Descripcion);
			$todoOK = true;
		}else{
			echo insertarActividadEspecifica($IDActividad, $Nombre, $Descripcion);
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
		<h3 class="panel-title"><strong>Gestionar Actividad Especifica</strong></h3>
	</div>
	<div class="panel-body">
		<form  ID="formulario" name="registro"  action="index.php?destino=gestionarActividadEspecifica" method="post">
			<?php if($edicion){ ?>
				<input id="IDActividadEspecifica" name="IDActividadEspecifica"  type="hidden" value="<?php echo $idActividadespecifica;?>"/>
			<?php }?>
			<div  class="form-group">
				<label for="IDACTIVIDAD" id="IDACTIVIDAD">Actividad :</label>
				
				<select name="IDACTIVIDAD">    
				
				<?php 
				
				$actividades=listarActividades();
				foreach ($actividades as $registro) {
					$IDActividad=$registro['IDACTIVIDAD'];
					$nombre=$registro['NOMBRE']; ?>
					
					<option value=<?php echo $IDActividad; ?>><?php echo $nombre; ?></option>
					
				<?php } 
				?>
      				
   				</select>
			<div  class="form-group">
				<label for="nombre" id="nombre">Nombre de la Actividad:</label>
				<input id="nombre" class="form-control"  name="nombre" id="nombre" type="text" size="50" value="<?php echo $Nombre; ?>">
				</input>
			</div>
			<div  class="form-group">
				<label for="descripcion" id="nombre">Descripcion:</label>
				<input id="descripcion" class="form-control"  name="descripcion" id="descripcion" type="text" size="255" value="<?php echo $Descripcion; ?>">
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
			descripcion:{
			    validators:{
            		notEmpty:{
            			message: "Debe introducir una descripcion"
            		},
            		stringLength: {
                        max: 50,
                        message: "La descripcion no puede superar el tamaño maximo permitido. 255 caracteres."
                    }
            		
            	}
			    
			}          
        }
    });
});
</script>