<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-heading">
			    <h3 class="panel-title">Entrar en tu Cuenta</h3>
			  </div>
			  <div class="panel-body">
					<form onSubmit="return validarLoginJS(this);" action="index.php" id="index" method="post" class="form-group">
					<input id="formLogin" name="formLogin"  type="hidden" value="1"/>
					<div class="form-group">
						<label for="user" class="col-lg-2 control-label">Usuario/DNI</label>
						<input  class="form-control" type="text" id="user" name="user">
					</div>
					<div class="form-group">
						<label for="password" class="col-lg-2 control-label">Contraseña</label>
						<input  class="form-control" type="text" id="password" name="password">
					</div>
					
					<br />
					<input type="submit" class="btn btn-primary" value="Acceder con mi usuario"/>
					<a href="index.php?destino=gestionarPersona" class="btn btn-success">Quiero Registrarme</a>
					</form>
				</div>
			</div>
</div>
<div class="col-md-6">
	<div class="panel panel-default">
		<div class="panel-body">
			<img src="Imagenes/original_103.jpg" align="center" width="800" lang="800"  class="img-responsive"  width="100%">
		</div>
	</div>
</div>

<script type="text/javascript">
	function validarLoginJS(){ 
		
		var ctrlUser = document.getElementById("user"); 
 		var user = ctrlUser.value; 
 		var ctrlPassword = document.getElementById("password"); 
 		var password = ctrlPassword.value; 
 		
 		var errores = false;
 		
 		if(user == ""){
 			alert('El Usuario o DNI no puede estar en blanco');
 			errores = true;
 			 //return false; 
 		}
 		if(password == ""){
 			alert('La Contraseña es obligatoria');
 		//	 return false; 
 			errores = true;
 		}
 		return !errores;
	} 
</script>