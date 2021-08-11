<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>CRUD MVC POO</title>

	
	<!-- Víncles cdn CSS -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>


	<!-- header -->

	<header class="container-fluid">
		
		<h3 class="text-center py-3">Título del CRUD</h3>

	</header>

<!-- 	nav menu -->

	<nav class="container-fluid  bg-light">
		
		<div class="container">

			<ul class="nav nav-justified py-2 nav-pills">

				<?php

					if(isset($_GET['pagina'])){
						$class = [
							'1' => $_GET['pagina']=='registro',
							'2' => $_GET['pagina']=='ingreso',
							'3' => $_GET['pagina']=='inicio',
							'4' => $_GET['pagina']=='salir'
						];
					}

				?>


				<li class="nav-item">
					<a class="nav-link <?php echo $active=($class['1'])? 'active' : ''; ?>" href="index.php?pagina=registro">Registro</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo $active=($class['2'])? 'active' : ''; ?>" href="index.php?pagina=ingreso">Ingreso</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo $active=($class['3'])? 'active' : ''; ?>" href="index.php?pagina=inicio">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo $active=($class['4'])? 'active' : ''; ?>" href="index.php?pagina=salir">Salir</a>
				</li>

			</ul>
		</div>
	</nav>

	

	<!-- content -->

	<main class="container-fluid">
		<div class="d-flex justify-content-center text-center">
		
		<div class="container py-5">

			<?php
				if (ISSET($_GET['pagina'])) {
					if(($_GET['pagina']=='registro')||($_GET['pagina']=='ingreso')
						||($_GET['pagina']=='inicio')||($_GET['pagina']=='salir'))
					{
						require 'paginas/'.$_GET['pagina'].'.php';
					}
					else require 'paginas/error404.php';
				}
				else {
					require 'paginas/registro.php';
				}
			?>

			<!-- Content -->

		</div>
	</div>
	</main>


	<!-- llibreries JS -->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>
	
</body>
</html>