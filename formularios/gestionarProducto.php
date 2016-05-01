<?php 

$todoOK = false;
$idproducto=null;
$edicion=false;
$fotoBD = null;
$nombre="";$descripcion="";$precio="";$stock="";$foto="";



if(isset($_GET['idProducto'])){
	
	$idproducto = $_GET['idProducto'];
	$edicion = true;
	
	$productoCompleto = buscarProducto($idproducto);
	$nombre = $productoCompleto['NOMBRE'];
	$descripcion = $productoCompleto['DESCRIPCION'];
	$precio = $productoCompleto['PRECIO'];
	$fotoBD = $productoCompleto['FOTO'];
	$stock= $productoCompleto['STOCK'];
	
}






if(isset($_POST["nombre"])){

	if(isset($_POST["idProducto"])) {
		$idproducto = $_POST['idProducto'];
		$edicion=true;
	}
	
	
	if(isset($_POST["nombre"])) 
		$nombre = $_POST['nombre'];
	if(isset($_POST["descripcion"])) 
		$descripcion = $_POST['descripcion'];
	if(isset($_POST["precio"])) 
		$precio = $_POST['precio'];
	if(isset($_POST["stock"])) 
		$stock = $_POST['stock'];
	if(isset($_POST["fotoBD"])) 
		$fotoBD = $_POST['fotoBD'];
	
	$precio = str_replace(",", ".", $precio);
	
	//foto
	$nombreFoto = $_FILES['foto']['name']; 
	$tipoFoto = $_FILES['foto']['type']; 
	$nombreFoto = "fisio".time();
	
	$ficheroCargado = false;
	$nombreFoto = $nombreFoto.".jpg";
	
	if (!((strpos($tipoFoto, "jpeg")))) { 
	}else{ 
	   	if (move_uploaded_file($_FILES['foto']['tmp_name'], "imagenes/".$nombreFoto)){ 
	      	 $ficheroCargado = true;
	   	}else{ 
	   	} 
	} 	
	
	//POr si solo quiere cambiar el nombre y no la foto
	if($_FILES['foto']['name'] == "")
		$nombreFoto = $fotoBD;
	
	$erroresValidacionPHP = checkTablaProduto(null, $nombre, $descripcion, $precio, $stock, $nombreFoto);
	
	if ($erroresValidacionPHP == "") {
		if($edicion){
			echo actualizarProducto($idproducto, $nombre, $descripcion, $precio, $stock, $nombreFoto);
			$todoOK = true;
		}else{
			echo insertarProducto($nombre, $descripcion, $precio, $stock, $nombreFoto);
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
		<h3 class="panel-title"><strong>Gestionar Producto</strong></h3>
	</div>
	<div class="panel-body">
		<form  ID="formulario" name="registro"  action="index.php?destino=gestionarProductos" method="post"  enctype="multipart/form-data">
				<?php if($edicion){ ?>
				<input id="idProducto" name="idProducto"  type="hidden" value="<?php echo $idproducto;?>"/>
				<?php }?>
				<?php if($fotoBD!= null){ ?>
					<input id="fotoBD" name="fotoBD"  type="hidden" value="<?php echo $fotoBD;?>"/>
				<?php }?>
			
			
			<div  class="form-group">
				<label for="nombre" id="nombre">Nombre:</label>
				<input id="nombre" class="form-control"  name="nombre" id="nombre" type="text" size="255" value="<?php echo $nombre; ?>">
				</input>
			</div>
			<br />
			
			<div  class="form-group">
				<label for="descripcion" id="descripcion">Descripcion:</label>
				<input id="descripcion" class="form-control"  name="descripcion" id="descripcion" type="text" size="255" value="<?php echo $descripcion; ?>">
				</input>
			</div>
			<br />
			
			<div  class="form-group">
				<label for="precio" id="campo1">Precio:</label>
				<input id="precio" class="form-control"  name="precio" id="precio" type="text" size="50" value="<?php echo $precio; ?>">
				</input>
			</div>
			<br />
			
			<div  class="form-group">
				<label for="stock" id="campo1">Stock:</label>
				<input id="stock" class="form-control"  name="stock" id="stock" type="text" size="50" value="<?php echo $stock; ?>">
				</input>
			</div>
			<br />
			
	 		<div class="form-group">
			    <label for="foto">Fotografía:</label>
			    <input type="file" name="foto" id="foto">
			  </div>
			<br />
			
			<div  class="form-group">
				<input type="submit" class="btn btn-success btn-mg" value="Aceptar" />
			</div>
		</form>
	</div>
</div>
<?php }
?>

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
				descripcion : {
					validators : {
						notEmpty : {
							message : "Debe rellenar la descripcion"
						},
						stringLength : {
							max : 255,
							message : "La cadena no debe superar los 255 caracteres."
						}

					}

				},
				unidades : {
					validators : {
						notEmpty : {
							message : "Debe rellenar las unidades"
						}
					}

				},
				stock : {
					validators : {
						notEmpty : {
							message : "Debe rellenar el stock"
						}

					}

				}
				
			}
		});
	}); 
</script>