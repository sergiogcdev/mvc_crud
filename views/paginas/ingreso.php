<form class="p-5 bg-light" method="post">
	<div class="form-group">

		<label for="email">Correo electrónico:</label>

		<div class="input-group">
			
			<div class="input-group-prepend">
				<span class="input-group-text">
					<i class="fas fa-envelope"></i>
				</span>
			</div>

			<input type="email" class="form-control" name="ingresoEmail">
		
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

			<input type="password" class="form-control" name="ingresoPassword">

		</div>

	</div>
	<?php $ingresado = new ControladorFormularios();
		$ingresado->ctrAcceso();
	?>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>