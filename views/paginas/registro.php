<form class="p-5 bg-light" method="post">

	<div class="form-group">
		<label for="nombre">Nombre:</label>

		<div class="input-group">
			
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fas fa-user"></i>
				</span>
			</div>

			<input type="text" class="form-control" id="nombre" name="registroNombre">

		</div>
		
	</div>

	<div class="form-group">

		<label for="email">Correo electrónico:</label>

		<div class="input-group">
			
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fas fa-envelope"></i>
				</span>
			</div>

			<input type="email" class="form-control" id="email" name="registroEmail">
		
		</div>
		
	</div>

	<div class="form-group">
		<label for="pwd">Contraseña:</label>

		<div class="input-group">
			
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fas fa-lock"></i>
				</span>
			</div>

			<input type="password" class="form-control" id="pwd" name="registroPassword">

		</div>

	</div>
	<?php
		$registro = ControladorFormularios::ctrRegistro(); 
		if($registro == 'OK') {
			echo '<script>
				if(window.history.replaceState){
					window.history.replaceState(null,null,window.location.href);
				}
			</script>';
			echo '<div class="alert-success">Usuario registrado</div>';
		}
		if($registro == 'ERROR') {
			echo '<div class="alert-danger">No se ha podido registrar el usuario.</div>';
		}
	?>
	<button type="submit" class="btn btn-primary">Enviar</button>

</form>