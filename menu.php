<?php //echo "<br />Admin:[".$admin."] cliente:[".$cliente."] empleado:[".$empleado."]"; ?>
<?php 
$hola=buscarClientePorDni($userSession);
$idfamoso=$hola['IDCLIENTE'];
?>

<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
		data-target=".navbar-ex1-collapse">
			<span class="sr-only">Desplegar navegación</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.php?destino=index">FisioSport</a>
	</div>

	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Tienda Online<b class="caret"></b> </a>
				<ul class="dropdown-menu">
					<?php if($anonimo || $cliente){ ?>
					<li>
						<a href="index.php?destino=listarproductos">Ver Productos</a>
					</li>
					<?php }
					if($empleado){ ?>
					<li>
						<a href="index.php?destino=listarproductos">Gestionar Stock</a>
					</li>
					<li>
						<a href="index.php?destino=gestionarProductos">Añadir Producto</a>
					</li>
					<?php } 
					if($admin){ ?>
					<li>
						<a href="index.php?destino=listarFacturas">Historial de Ventas</a>
					</li>
					
					<?php } ?>
				</ul>
			</li>
			<li>
				<a href="index.php?destino=precioabono">Precio y Abono</a>
			</li>
			<?php if($cliente || $empleado){ ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Entrenamientos<b class="caret"></b> </a>
				<ul class="dropdown-menu">
					<?php if($cliente){ ?>
					<li>
						<a href="index.php?destino=listarEntrenamientos&idcliente=<?php echo $idfamoso; ?>" >Mis Entrenamientos</a>
					</li>
					
					<?php }	if($empleado){ ?>
					<li>
						<a href="index.php?destino=listaractividades">Gestionar Actividades</a>
					</li>
					<li>
						<a href="index.php?destino=gestionarActividad">Nueva Actividad</a>
					</li>
					<li>
						<a href="index.php?destino=listarActividadesEspecificas">Gestionar Actividades Específicas</a>
					</li>
					<li>
						<a href="index.php?destino=gestionarActividadEspecifica">Nueva Actividad Especifica</a>
					</li>
					<li>
						<a href="index.php?destino=listarEntrenamiento">Gestionar Entrenamientos</a>
					</li>
					<li>
						<a href="index.php?destino=gestionarEntrenamiento">Crear Entrenamiento</a>
					</li>
					
					<li>
						<a href="index.php?destino=gestionarEntrenamientoEjercicios">Gestionar Ejercicios en los Entrenamientos</a>
					</li>
					
					
					
					<?php } ?>
				</ul>
			</li>
			<?php } ?>
			
			
			<?php if($cliente){ ?>
					<li>
						<a href="index.php?destino=listarCarrito&idcliente=<?php echo $idfamoso ?>">Ver Carrito</a>
					</li>
					<li>
						<a href="index.php?destino=listarFactura&idcliente=<?php echo $idfamoso ?>">Ver Facturas</a>
					</li>
			<?php } ?>
			
			
			<?php if($empleado){ ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes<b class="caret"></b> </a>
				<ul class="dropdown-menu">
					<li>
						<a href="index.php?destino=listarpersonas&cliente=1">Ver Clientes</a>
					</li>
					
				</ul>
			</li>
			<?php } ?>
			<li>
				<a href="index.php?destino=instalaciones">Conoce las Instalaciones</a>
			</li>
			
			<?php
			if($admin){ ?>
				<li>
						<a href="index.php?destino=listarpersonas&empleado=1">Ver Empleados</a>
				</li>
				<li>
						<a href="index.php?destino=nuevoEmpleado">Crear Empleado</a>
				</li>
			<?php }			?>
			
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<?php if(!$anonimo){ ?>
			<li>
				<a class="navbar-brand" href="#">Bienvenido: <?php /*if(isset($userSession))*/ echo $userSession; ?></a>
			</li>
			<li>
				<a class="navbar-brand" href="salir.php">Salir</a>
			</li>
			<?php } else { ?>
			<li>
				<a class="navbar-brand" href="index.php?destino=login">Entrar</a>
			</li>
			<?php } ?>
		</ul>
	</div>
</nav>