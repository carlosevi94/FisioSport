<?php
$hola = buscarClientePorDni($userSession);
$idfamoso = $hola['IDCLIENTE'];


?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<?php
if($cliente || $anonimo){
		?>
		<h3 class="panel-title"><strong>Listado de Productos</strong></h3>
		<?php } else{ ?>
		<h3 class="panel-title"><strong>Gestionar Productos</strong></h3>
		<?php } ?>
	</div>
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th>Foto</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Stock</th>
					<?php if($cliente || $empleado){
					?>
					<th></th>
					<?php } ?>
				</tr>
				<?php
$productos = listarProductos();

foreach ($productos as $registro ) {
$foto = $registro['FOTO'];
$id = $registro['IDPRODUCTO'];
$nombre = $registro['NOMBRE'];
$descripcion = $registro['DESCRIPCION'];
$stock = $registro['STOCK'];
$precio = $registro['PRECIO'];

echo "<td width=\"120px\"><img width=\"120px\" src=\"imagenes/".$foto."\"/></td>";
echo "<td>".$nombre."</td>";
echo "<td>".$descripcion."</td>";
echo "<td width=\"85px\">".$precio." €</td>";
echo "<td width=\"150px\">";
if($stock > 0){
				?>
				<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar"
					aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
					style="width: 100%"></div>
				</div>
				<?php
				}else{
				?>
				<div class="progress">
					<div class="progress-bar progress-bar-danger" role="progressbar"
					aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
					style="width: 100%"></div>
				</div>
				<?php }
					echo "</td>";
					if($cliente){
					if($stock==0){
					echo "<td><a class=\"btn btn-primary\"  href=\"index.php?destino=listarCarrito&idcliente=".$idfamoso."&idproducto=".$id."\"     disabled=\"disabled\"           >Comprar</a>";

					}else{
					echo "<td><a class=\"btn btn-primary\" href=\"index.php?destino=listarCarrito&idcliente=".$idfamoso."&idproducto=".$id."&comprar=1\">Comprar</a>";

					}

					}
					if($empleado){
					echo "<td><a class=\"btn btn-info\" href=\"index.php?destino=gestionarProductos&idProducto=".$id."\">Modificar</a>";
					}

					echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>

	<?php if ($empleado){
	?>
	<div class="panel-body">
		<a class="btn btn-primary" href="index.php?destino=gestionarProductos">Nuevo Producto</a>;

	</div>
	<?php } ?>
</div>

