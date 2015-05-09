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
require_once("includes/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	
	
	<link rel="stylesheet" type="text/css" href="includes/styleHeader.css">
	<link rel="stylesheet" type="text/css" href="includes/styleForms.css">
	<link rel="stylesheet" type="text/css" href="includes/style.css">
	<script type="text/javascript" src="includes/jquery.js"></script>	
	<script type="text/javascript" src="includes/script.js"></script>
</head>
<body>
<div id="header">
		<ul class="nav">
			<li><a href="index.php">Inicio</a></li>
			
			<li><a href="Ventas_index.php">Ventas</a>
				<ul>
					<li><a href="Ventas_index.php">Venta</a></li>
					<li><a href="verVentas.php">Ver Ventas</a>
					<ul>
						<li><a href="">Lista</a></li>
						<li><a href="">Grafica</a></li>

					</ul>
					</li>
				</ul>
			</li>
			<li><a href="verClientes.php">Clientes</a>
				<ul>
					<li><a href="formularioNuevoCliente.php">Nuevo Cliente</a></li>	
				</ul>
			</li>
			<li><a href="servicios.php">Servicios</a>
				<ul>
					<li><a href="servicios.php?ubicacion=1">Nuevo Servicio</a></li>
				</ul>
			</li>
			<li><a href="articulos.php">Articulos</a>
				<ul>
					<li><a href="articulos.php?ubicacion=1">Nuevo Articulo</a></li>
				</ul>
			</li>
			<?php
			if(isset($_SESSION['empleado'])){
			?>
			
			<li><a href="salir.php">Cerrar Sesion</a></li>
			<?php
			}
			?>

		</ul>

		<?php 
		if(!isset($_SESSION['empleado'])){
		?>
		<div id="formLogin">
		<form action="logueo.php" method="post" >
		Correo: <input type="email" name="email" placeholder="Ingresa tu correo" required>
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

