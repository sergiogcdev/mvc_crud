<?php

	if(isset($_GET['token'])){
		$columna = "token";
		$valor = $_GET['token'];

		$usuario = ControladorFormularios::ctrSeleccionarRegistros($columna, $valor);

	}

?>

<form class="p-5 bg-light" method="post">

	<div class="form-group">

		<div class="input-group">
			
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fas fa-user"></i>
				</span>
			</div>

			<input type="text" class="form-control" value="<?php echo $usuario['nombre']; ?>" id="actualizarNombre" name="actualizarNombre">

		</div>
		
	</div>

	<div class="form-group">

		<div class="input-group">
			
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fas fa-envelope"></i>
				</span>
			</div>

			<input type="email" value="<?php echo $usuario['email']; ?>" class="form-control" id="actualizarEmail" name="actualizarEmail">
		
		</div>
		
	</div>

	<div class="form-group">
		<div class="input-group">
			
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fas fa-lock"></i>
				</span>
			</div>

			<input type="hidden" value="<?php echo $usuario['password']; ?>" class="form-control" id="passwordActual" name="passwordActual">
			<input type="hidden" value="<?php echo $usuario['token']; ?>" class="form-control" id="tokenUsuario" name="tokenUsuario">

			<input type="hidden" value="<?php echo $usuario['id']; ?>" class="form-control" id="idUsuario" name="idUsuario">

			<input type="password" class="form-control" id="actualizarPassword" name="actualizarPassword">

		</div>

	</div>
	<?php
		$actualizar = ControladorFormularios::ctrActualizarRegistro(); 
		if($actualizar == 'OK') {
			echo '<script>
				setTimeout(function(){
					window.location="inicio";
				}, 3000);
			</script>';
			echo '<div class="alert-success">Usuario actualizado</div>';
		}
		if($actualizar == "ERROR"){
			echo '<div class="alert-danger">Error en la actualización del usuario</div>';
		}
	?>
	<button type="submit" class="btn btn-primary">Actualizar</button>

</form>