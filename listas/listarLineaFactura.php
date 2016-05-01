<?php
$idfactura = null;
if (isset($_GET['IDFactura'])) {
	$idfactura = $_GET['IDFactura'];
}
?>

<div class="panel panel-primary">
	<div class="panel-heading">

		<h3 class="panel-title"><strong>Linea de Factura de la Factura #000<?php echo $idfactura?></strong></h3>

	</div>
	<div class="panel-body">

		<div class="table-responsive table-bordered">
			<table class="table">
				<tr>
					<th>Producto</th>
					<th>Nombre</th>
					<th>Precio Compra</th>
					<th>Unidades</th>
					<th>Total</th>					
				</tr>
				<?php
				$facturas = listarLineaFactura($idfactura);

				foreach ($facturas as $registro) {
					$idlineafac = $registro['IDLINEAFACTURA'];
					$idprod = $registro['IDPRODUCTO'];
					$idcliente = $registro['IDCLIENTE'];
					$idfactura = $registro['IDFACTURA'];
					$preciocom = $registro['PRECIOCOMPRA'];
					$unidades = $registro['UNIDADES'];
					$nombre = $registro['NOMBRE'];
					$foto = $registro['FOTO'];

					$precioTotal = $preciocom * $unidades;

					echo "<td width=\"120px\"><img width=\"120px\" src=\"imagenes/" . $foto . "\"/></td>";
					echo "<td>" . $nombre . "</td>";
					echo "<td>" . $preciocom . " €</td>";
					echo "<td>" . $unidades . " Uds</td>";
					echo "<td>" . $precioTotal . " €</td>";

					echo "</tr>";

				}
				?>
			</table>
		</div>
	</div>
</div>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         