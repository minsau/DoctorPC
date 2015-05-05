<?php
$status = session_status();

if($status == PHP_SESSION_NONE)
{
    session_start();
}

if($status == PHP_SESSION_DISABLED)
{
   
}

if($status == PHP_SESSION_ACTIVE)
{
   
}
require_once("includes/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>	
	
	<link rel="stylesheet" type="text/css" href="includes/styleHeader.css">
	<script type="text/javascript" src="includes/jquery.js"></script>
	<script type="text/javascript" src="includes/ajax.js"></script>
	<script type="text/javascript" src="includes/script.js"></script>
</head>
<body>
<div id="header">
		<ul class="nav">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="formularioNuevoCliente.php">Clientes</a>
				<ul>
					<li><a href="">Ver clientes</a></li>	
				</ul>
			</li>
			<li><a href="Ventas_index.php">Ventas</a>
				<ul>
					<li><a href="">Venta</a></li>
					<li><a href="">Ver Ventas</a>
					<ul>
						<li><a href="">Lista</a></li>
						<li><a href="">Grafica</a></li>

					</ul>
					</li>
				</ul>
			</li>
			<li><a>Articulos</a></li>
		</ul>

		<?php 
		if(!isset($_SESSION['empleado'])){
		?>
		<div id="formulario">
		<form action="logueo.php" method="post" >
		Correo: <input type="e-mail" name="email" placeholder="Ingresa tu correo" required>
		Contraseña: <input type="password" name="pass" placeholder="Ingresa tu Contraseña">
		<input type="submit" name="" value="Entrar">
		</form>
		</div>
		<?php
		}
		?>
	</div>
</body>
</html>

