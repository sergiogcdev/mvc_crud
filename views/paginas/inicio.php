<?php
if(!isset($_SESSION['validaAcceso']) || $_SESSION['validaAcceso'] != 'OK') {
	echo '<script>window.location = "ingreso";</script>';
}
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>id</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php
				foreach ($usuarios as $key => $value): ?>
		<tr>
			
			<td><?php echo $key; ?></td>
			<td><?php echo $value['nombre']; ?></td>
			<td><?php echo $value['email']; ?></td>
			<td><?php echo $value['fecha']; ?></td>
			<td>
				
				<div class="btn-group">
					<div class="px-1">
					    <a href="index.php?pagina=editar&token=<?php echo $value['token']; ?>" class="btn btn-alert"><i class="fas fa-pencil-alt"></i></a>
					</div>
					<form method="POST">
						<input type="hidden" value="<?php echo $value['token']; ?>" id="eliminaRegistro" name="eliminaRegistro">
						<button type="submit" class="btn btn-warning"><i class="fas fa-trash-alt"></i></button>
						<!-- Eliminar -->
						<?php
						$ctr = new ControladorFormularios();
						$ctr -> ctrEliminaRegistro();
						?>
					</form>
				</div>
			</td>
			
		</tr>
		<?php endforeach ?>
	</tbody>
</table>