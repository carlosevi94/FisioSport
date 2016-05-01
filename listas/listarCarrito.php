<?php

$idcliente = null;
$idproducto = null;

$hola = buscarClientePorDni($userSession);
$idcliente = $hola['IDCLIENTE'];

if (isset($_GET['idproducto'])) {
	$idproducto = $_GET['idproducto'];
}

if (isset($_GET['vaciar']) && $_GET["vaciar"] == 1) {
	echo vaciaCarrito($idcliente);
}

if (isset($_GET["comprar"]) && $_GET["comprar"] == 1) {
	$idproducto = $_GET["idproducto"];

	$producto = buscarCarrito($idproducto,$idcliente);
	if ($producto) {
		$unidades = $producto['UNIDADES'];
		$idCarrito = $producto['IDCARRITO'];
		$unidades++;
		echo actualizaUnidadesProducto($idproducto, $idcliente, $unidades);
	} else {
		echo insertarCarrito($idproducto, $idcliente, 1);
	}
}


?>

<div class="panel panel-primary">
	<div class="panel-heading">

		<h3 class="panel-title"><strong>Carrito de compra</strong></h3>

	</div>
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th>Producto</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Unidades</th>
					<th>Total</th>
				</tr>
				<?php
				
				$hayProductos = false;
				
				$totalCarrito = 0;
				$carritos = listaCarritoSegunUsuario($idcliente);
				foreach ($carritos as $registro) {
					$hayProductos = true;
					$idcarrito = $registro['IDCARRITO'];
					$unidades = $registro['UNIDADES'] . " Uds";
					$precii = $registro['PRECIO'] . " €";
					$total = $precii * $unidades . " €";
					$foto = $registro['FOTO'];
					$prodii = $registro['NOMBRE'];

					echo "<td width=\"120px\"><img width=\"120px\" src=\"imagenes/" . $foto . "\"/></td>";
					echo "<td>" . $prodii . "</td>";
					echo "<td>" . $precii . "</td>";
					echo "<td>" . $unidades . "</td>";
					echo "<td>" . $total . "</td>";
					echo "</tr>";
					$totalCarrito +=$total;
				}
				?>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th>Total</th>
					<th><?php echo $totalCarrito; ?> €</th>
				</tr>
			</table>
		</div>
	</div>

	<div class="panel-body">
		<?php
		if ($cliente && $hayProductos) {
			echo "<td><a class=\"btn btn-success\" href=\"index.php?destino=listarFactura&compra=1&total=".$totalCarrito."&idcliente=" . $idcliente . "\">Realizar Compra</a>&nbsp&nbsp";
			echo "<td><a class=\"btn btn-danger\" href=\"index.php?destino=listarCarrito&vaciar=1&idcliente=" . $idcliente . "\">Vaciar Carrito</a>";

		}
		?>
	</div>
</div>

