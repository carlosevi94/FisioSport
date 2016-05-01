<?php

if (isset($_GET["compra"]) && $_GET["compra"] == 1) {
	$idCliente = $_GET["idcliente"];
	$totalCompra = $_GET["total"];

	echo insertarFactura($idCliente, $totalCompra);

	$facturas = listarFacturaDeCliente($idCliente);
	$idFactura = null;
	foreach ($facturas as $registro) {
		$idFactura = $registro['IDFACTURA'];
	}

	$carritos = listaCarritoSegunUsuario($idCliente);
	foreach ($carritos as $registro) {
		$idProducto = $registro['IDPRODUCTO'];
		$idcarrito = $registro['IDCARRITO'];
		$unidades = $registro['UNIDADES'];
		$precii = $registro['PRECIO'];
		$stock = $registro['STOCK'];

		insertarLineaFactura($idProducto, $idCliente, $idFactura, $precii, $unidades);

		$stock--;
		actualizaStock($idProducto, $stock);
		/*if($stock == 0 ){

		 }*/
	}

	echo vaciaCarrito($idCliente);
}
?>

<div class="panel panel-primary">
	<div class="panel-heading">

		<h3 class="panel-title"><strong>Listado de Facturas</strong></h3>

	</div>
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th># Ident. Factura</th>
					<th>Total de Importe</th>
					<th></th>
				</tr>
				<?php

				if ($cliente) {
					$facturas = listarFacturaDeCliente($idfamoso);
				} else if ($empleado || $admin) {
					$facturas = listarFactura();
				} 

				foreach ($facturas as $registro) {
					$idFactura = $registro['IDFACTURA'];
					$precioTotal = $registro['PRECIOTOTAL'];

					echo "<td>000" . $idFactura . "</td>";
					echo "<td>" . $precioTotal . " €</td>";

					if ($empleado) {
						echo "<td><a class=\"btn btn-success\" href=\"index.php?destino=gestionarFactura&IDFactura=" . $idFactura . "\">Editar</a>";

					}
					echo "<td><a class=\"btn btn-success\" href=\"index.php?destino=listarLineaFactura&IDFactura=" . $idFactura . "\">Ver Detalles</a>";

					echo "</tr>";

				}
				?>
			</table>
		</div>
	</div>
</div>

