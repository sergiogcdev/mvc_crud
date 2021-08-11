<?php
session_start();
?>
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


				<li class="nav-item">
					<a class="nav-link <?php echo ($_GET['pagina']=='registro') ? 'active' : ''; ?>" href="registro">Registro</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo ($_GET['pagina']=='ingreso') ? 'active' : ''; ?>" href="ingreso">Ingreso</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo ($_GET['pagina']=='inicio') ? 'active' : ''; ?>" href="inicio">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php echo ($_GET['pagina']=='salir') ? 'active' : ''; ?>" href="salir">Salir</a>
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
						||($_GET['pagina']=='inicio')||($_GET['pagina']=='salir')
						|| ($_GET['pagina'] == 'editar') )
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
	<!--<script src="views/js/jquery-3.5.1.min.js"></script>-->

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

	<!-- Script -->
	<script src="views/js/ajaxjq.js"></script>
	
</body>
</html>