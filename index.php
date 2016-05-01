<?php
session_start();

require_once ("ConexionBD.php");
require_once ("bdoracle/bdincludes.php");
require_once ("validations/validacion.php");

//$testOracle = CrearConexionBD();CerrarConexionBD($testOracle);

if (isset($_POST['formLogin']) && isset($_POST['formLogin']) == 1) {
	$user = $_POST['user'];
	$pass = $_POST['password'];

	accederWeb($user, $pass);
}

//echo "<br />Perfil:".$_SESSION['perfil']." user : ".$_SESSION["user"];

$admin = false;
$cliente = false;
$empleado = false;
$anonimo = true;
$userSession = "";

if (isset($_SESSION["perfil"])) {
	$cliente = $_SESSION["perfil"] == "Cliente";
	$admin = $_SESSION["perfil"] == "Administrador";
	$empleado = $_SESSION["perfil"] == "Empleado";
	$anonimo = false;
	if (isset($_SESSION["user"]))
		$userSession = $_SESSION["user"];
}
//echo "<br />Admin:[".$admin."] cliente:[".$cliente."] empleado:[".$empleado."]";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Inicio</title>

		<meta name="description" content="">
		<meta name="author" content="USER">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		<link rel="stylesheet" type="text/css" href="estiloindex.css" />

		<link rel="stylesheet" href="css/style.css">
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/bootstrap-formhelpers.min.js"></script>
		<script type="text/javascript" src="js/bootstrapValidator.min.js"></script>

		<link rel="stylesheet" href="estilos/bootstrap.min.css">
		<link rel="stylesheet" href="estilos/bootstrap-theme.min.css">
		<link rel="stylesheet" href="estilos/bootstrap-formhelpers.min.css">
		<link rel="stylesheet" href="estilos/bootstrapValidator.min.css">

		<link rel="stylesheet" href="estilos/bjqs.css">
		<script src="js/bjqs-1.3.min.js"></script>
		<link rel="stylesheet" href="estilos/demo.css">

	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<?php
				include ("menu.php");
				?>
			</div>

			<div class="row">
				<?php
				//Controlador de Vistas
				$destino = "";

				//Comprobamos que se haya indicado un destino en la URL GET
				if (isset($_GET["destino"])) {
					$destino = $_GET["destino"];
				} else {
					$destino = "error";
				}

				//Redireccionamiento de las páginas
				switch ($destino) {
					case "index" :
						include ("portada.php");
						break;
					case "login" :
						include ("formularios/login.php");
						break;
					case "precioabono" :
						include ("precioabono.php");
						break;
					case "listaractividades" :
						include ("listas/listarActividades.php");
						break;
					case "gestionarActividad" :
						include ("formularios/gestionarActividad.php");
						break;
					case "listarActividadesEspecificas" :
						include ("listas/listarActividadesEspecificas.php");
						break;
					case "gestionarActividadEspecifica" :
						include ("formularios/gestionarActividadEspecifica.php");
						break;
					case "listarpersonas" :
						include ("listas/listarPersonas.php");
						break;
					case "listarproductos" :
						include ("listas/listarProductos.php");
						break;
					case 'listarEntrenamientos' :
						include ("listas/listarEntrenamiento.php");
						break;
					case "gestionarPersona":
						include("formularios/gestionarPersona.php");
						break;
					case "listarentreje":
						include("listas/listarEntrenamientoEjercicios.php");
						break;
					case "listarCarrito":
						include("listas/listarCarrito.php");
						break;	
					case "listarEntrenamiento2":
						include("listas/listarEntrenamiento2.php");
						break;
					case "listarEntrenamiento":
						include("listas/listarEntrenamiento.php");
						break;
					case "instalaciones":
						include("instalaciones.php");
						break;
						
					case "gestionarEntrenamientoEjercicios":
						include ("formularios/gestionarEntrenamientoEjercicios.php");
						
						break;
						
					case "gestionarProductos":
						include("formularios/gestionarProducto.php");
						break;
						
					case "gestionarEntrenamiento":
						include("formularios/gestionarEntrenamiento.php");
						break;
						
						
					case "listarFactura":
						include("listas/listarFactura.php");
						break;
						
					case "listarLineaFactura":
						include("listas/listarLineaFactura.php");
						break;	
					case "listarEntramientoEjercicios":
						include("listas/listarEntrenamientoEjercicios.php");
						break;	
						
					case "nuevoEmpleado":
							include ("formularios/gestionarPersona.php");
							break;						
						
					case "listarFacturas":
							include ("listas/listarFactura.php");
							break;						
						


					case "error" :
						include ("portada.php");
						break;
					case "carrito" :
						if ($cliente)
							include ("carrito.php");
						else
							include ("error.php");
						break;
					default :
						include ("error.php");
						break;
				}
				?>
			</div>
		</div>

		<?php
		include ("pie.php");
		?>
