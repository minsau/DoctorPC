<?php
require_once("includes/header.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrar</title>
</head>
<body>
<div class="container">
<?php
	if(!$_POST){
?>
	Servicios
	Articulos
	Empleados
	Clientes
<?php		
	}
?>
</div>
</body>
</html>




CREATE DATABASE LINK Alan2 CONNECT TO system IDENTIFIED BY Oracle12c USING 'conexionAlan';

select * from prueba@Alan2;

