<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Happy Pets</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="icon" href="../images/logo.png" sizes="32x32" />
	<link rel="icon" href="../images/logo.png" sizes="192x192" />
	<link rel="apple-touch-icon" href="../images/logo.png" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
	<div class="contenedor">
		<header class="cabeceraPrincipal">
			<section class="logotipo"><img src="../images/logotipoPet.png"></section>
			<nav class="menuPrincipal">
				<a href="../index.php">Inicio</a>
				<a href="servicios.php">Servicios</a>
				<a href="productos.php">Productos</a>
				<a href="adopcion.php">Adopción</a>
				<a href="personal.php">Personal</a>
				<a href="#">Postulaciones</a>
				<a href="lista-postulaciones.php">Lista Postulaciones</a>
			</nav>
		</header>

		<main>
			<h2>Formulario de postulación</h2>
			<?php
			include("../dll/config.php");
			include("../dll/class_mysqli.php");
			$miconexion = new class_mysqli();
			$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
			$miconexion->consulta("select id, nombre from mascota");
			// $miconexion->verconsulta();
			$res = $miconexion->fetchAll();
			// echo count($res);
			// for ($i = 0; $i < count($res); $i++) {
			// 	for ($j = 0; $j < count($res[$i]); $j++) {
			// 		echo $res[$i][$j];
			// 	}
			// }

			echo "<form action= 'procesarPostulacion.php' method='post'>";
			echo "	<div class='grupoinput'>";
			echo "		<label for='nombres'>Nombres <span class='colorRojo'>*</span></label>";
			echo "		<input type='text' id='nombres' name='nombres' placeholder='Ingrese sus nombres' required>";
			echo "	</div>";
			echo "	<div class='grupoinput'>";
			echo "		<label for='apellidos'>Apellidos <span class='colorRojo'>*</span></label>";
			echo "		<input type='text' id='apellidos' name='apellidos' placeholder='Ingrese sus apellidos' required>";
			echo "	</div>";
			echo "	<div class='grupoinput'>";
			echo "		<label for='direccion'>Dirección <span class='colorRojo'>*</span></label>";
			echo "		<input type='text' id='direccion' name='direccion' placeholder='Ingrese su direccion' required>";
			echo "	</div>";
			echo "	<div class='grupoinput'>";
			echo "		<label for='correo'>Correo <span class='colorRojo'>*</span></label>";
			echo "		<input type='email' id='correo' name='correo' placeholder='Ingrese su correo' required>";
			echo "	</div>";
			echo "	<div class='grupoinput'>";
			echo "		<label for='cedula'>Cedula <span class='colorRojo'*</span></label>";
			echo "		<input type='number' id='cedula' name='cedula' placeholder='Ingrese su cedula' required>";
			echo "	</div>";
			echo "	<div class='grupoinput'>";
			echo "		<select name='mascota' id='mascota'>";
			echo "			<option disabled selected>Elegir una mascota</option>";
			for ($i = 0; $i < count($res); $i++) {
				for ($j = 0; $j < count($res[$i]); $j=$j+4) {
					echo "			<option value='" . $res[$i][$j] . "' id='mascota' name='mascota'>" . $res[$i][$j+1] . "</option>";
					// echo $res[$i][$j];
				}
			}
			echo "		</select>";
			echo "	</div>";
			echo "	<button type='submit' class='button'>Postular adopción</button>";
			echo "</form>";
			?>

		</main>

		<section class="sponsor">
			<h3>Sponsor</h3>
		</section>


		<footer class="piePagina">
			<section class="derechos">
				<h6>Derechos Reservados UTPL 2022</h6>
			</section>
			<nav class="redesSociales">
				<a href=""><i class="fa-brands fa-facebook"></i></a>
				<a href=""><i class="fa-brands fa-square-instagram"></i></a>
				<a href=""><i class="fa-brands fa-tiktok"></i></a>
			</nav>
		</footer>
	</div>
</body>

</html>