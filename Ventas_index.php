<?php
session_start();
require_once("includes/connection.php");
require_once("includes/header.php");
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
	<script type="text/javascript" src="includes/ajaxClientes.js"></script>
	
</head>
<body>
	
		
		<div class="container">
			<div id="formBuscar" class="center">
			<h1>Buscar Cliente </h1>
				<form action="" method="post" name="buscador_form" id="buscador_form">
					<input type="search" name="buscar" id="search">
				</form>
			
			<div id="resultados">
			</div>
				
			</div>
			</div>
		
	
</body>
</html>
<?php
}
?>