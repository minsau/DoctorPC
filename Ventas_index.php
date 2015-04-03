<?php
session_start();
require_once("includes/connection.php");
	if(!isset($_SESSION['empleado'])){
		echo "<script type='text/javascript' >
        alert('No estas logueado');
      </script>
      ";
		
	}else{
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>
	<link rel="stylesheet" type="text/css" href="includes/style.css">	
	<script type="text/javascript" src="includes/jquery.js"></script>
	
</head>
<body>
	
		
		<div class="container">
			<div class="form center">
			<h1>Buscar Cliente </h1>
				<form action="" method="post" name="buscador_form" id="buscador_form">
					<input type="search" name="buscar">
				</form>
			</div>
			<div id="resultados"></div>
			<div class="footer center">
				Copirigth :D
			</div>
		</div>
		
	
</body>
</html>
<?php
}
?>