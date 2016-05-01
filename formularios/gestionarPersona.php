<?php 

$nombre = null;
$todoOK = false;
$nombre="";$apellidos="";$dni="";$email="";$sexo="";$telefono="";$fechaNac="";$direccion="";$pass="";
if(isset($_POST["nombre"])){

	if(isset($_POST["nombre"])) 
		$nombre = $_POST['nombre'];
	if(isset($_POST["apellidos"])) 
		$apellidos = $_POST['apellidos'];
	if(isset($_POST["dni"])) 
		$dni = $_POST['dni'];
	if(isset($_POST["email"])) 
		$email = $_POST['email'];
	if(isset($_POST["sexo"])) 
		$sexo = $_POST['sexo'];
	if(isset($_POST["telefono"])) 
		$telefono = $_POST['telefono'];
	if(isset($_POST["fechaNac"])) 
		$fechaNac = $_POST['fechaNac'];
	if(isset($_POST["direccion"])) 
		$direccion = $_POST['direccion'];
	if(isset($_POST["pass"])) 
		$pass = $_POST['pass'];
	
	$erroresValidacionPHP = checkTablaPersona($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechaNac, $direccion, $pass);
	
	if ($erroresValidacionPHP == "") {
		if($admin){
			echo insertarEmpleado($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechaNac, $direccion, $pass);
		}else if($anonimo){
			echo insertarCliente($nombre, $apellidos, $dni, $email, $sexo, $telefono, $fechaNac, $direccion, $pass);
		}
		$todoOK = true;
	} else {
		echo "<div class=\"alert alert-danger\"><strong>".$erroresValidacionPHP."</strong></div>";
	}
}
if($todoOK == false){
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<?php if($admin){ ?>
			<h3 class="panel-title"><strong>Gestionar Empleados</strong></h3>
		<?php }else if($anonimo){ ?>
			<h3 class="panel-title"><strong>Registrarse como Cliente</strong></h3>
		<?php } ?>
	</div>
	<div class="panel-body">
		<form  ID="formulario" name="registro"  action="index.php?destino=gestionarPersona" method="post">
			<div  class="form-group">
				<label for="nombre" id="nombre">Nombre:</label>
				<input id="nombre" class="form-control"  name="nombre" id="nombre" type="text" size="50" value="<?php echo $nombre; ?>">
				</input>
			</div>
			<div  class="form-group">
				<label for="apellidos" id="apellidos">Apellidos:</label>
				<input id="apellidos" class="form-control"  name="apellidos" id="apellidos" type="text" size="50" value="<?php echo $apellidos; ?>">
				</input>
			</div>
			<div  class="form-group">
				<label for="dni" id="dni">DNI:</label>
				<input id="dni" class="form-control"  name="dni" id="dni" type="text" size="9" value="<?php echo $dni; ?>">
				</input>
			</div>
			<div  class="form-group">
				<label for="email" id="email">Email:</label>
				<input id="email" class="form-control"  name="email" id="email" type="text" size="50" value="<?php echo $email; ?>">
				</input>
			</div>
			<div  class="form-group">
				<label for="sexo" id="sexo">Sexo:</label>
				<select class="form-control" id="sexo" name="sexo">
	              <optgroup label="Sexo">
	                <option value ="H">Hombre</option>
	                <option value ="M">Mujer</option>
	             </optgroup>
	             </select>
			</div>
			<div  class="form-group">
				<label for="telefono" id="telefono">Telefono Movil:</label>
				<input id="telefono" class="form-control"  name="telefono" id="telefono" type="text" size="9" value="<?php echo $telefono; ?>">
				</input>
			</div>
			<div  class="form-group">
				<label for="fechaNac" id="fechaNac">Fecha de Nacimiento:</label>
				<input id="fechaNac" class="form-control"  name="fechaNac" id="fechaNac" type="text" size="50" value="<?php echo $fechaNac; ?>">
				</input>
			</div>
			<div  class="form-group">
				<label for="direccion" id="direccion">Direccion:</label>
				<input id="direccion" class="form-control"  name="direccion" id="direccion" type="text" size="255" value="<?php echo $direccion; ?>">
				</input>
			</div>
			<div  class="form-group">
				<label for="pass" id="nombre">Password:</label>
				<input id="pass" class="form-control"  name="pass" id="pass" type="text" size="32" value="<?php echo $pass; ?>">
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
	/*$(document).ready(function() {
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
							max : 50,
							message : "La cadena no debe superar los 50 caracteres."
						}

					}

				},
				apellidos : {
					validators : {
						notEmpty : {
							message : "Debe rellenar los apellidos"
						},
						stringLength : {
							max : 50,
							message : "La cadena no debe superar los 50 caracteres."
						}

					}

				},
				dni : {
					validators : {
						notEmpty : {
							message : "Debe rellenar el dni"
						},
						regexp : {
							regexp : /^[XYZ]?([0-9]{7,8})([A-Z])$/i,
							message : "DNI incorrecto"
						}

					}

				},
				email : {
					validators : {
						notEmpty : {
							message : "Debe rellenar el email"
						},
						emailAddress : {
							message : 'Email no valido'
						},
						stringLength : {
							max : 50,
							message : "La cadena no debe superar los 50 caracteres."
						}

					}

				},
				telefono : {
					validators : {
						notEmpty : {
							message : "Debe rellenar el email"
						},
						stringLength : {
							max : 9,
							message : "Telefono erroneo. No introduza (+34)"
						}

					}

				},
				fechaNac : {
					notEmpty : {
						message : "Debe introducir una contraseña"
					},
					stringLength : {
						max : 32,
						message : "Fecha no permitida."
					}

				},
				direccion : {
					validators : {
						notEmpty : {
							message : "Debe rellenar la direccion"
						},
						stringLength : {
							max : 255,
							message : "La direccion es demasiado larga"
						}

					}

				},
				pass : {
					validators : {
						notEmpty : {
							message : "Debe introducir una contraseña"
						},
						stringLength : {
							max : 32,
							message : "Contraseña no permitida, el tamaño maximo es de 32 caracteres"
						}

					}

				}

			}
		});
	}); */
</script>