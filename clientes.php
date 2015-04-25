<?php
require_once("includes/connection.php");
require_once("includes/header.php");
$sql = "SELECT * FROM persona";
$res = mysql_query($sql,$conexion) or die(mysql_error());
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<body>
	<div class="container">
		<table border="0">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Direccion</td>
				<td>Telefono</td>
				<td>Correo</td>
			</tr>

			<?php
			while($reg = mysql_fetch_array($res)){
			?>
			<tr>
				<td><?php echo $reg['idPersona']; ?></td>
				<td><?php echo $reg['nombresPersona']." ".$reg['aPaterno']." ".$reg['aMaterno']; ?></td>
				<td><?php echo $reg['direccion']; ?></td>
				<td><?php echo $reg['telefono']; ?></td>
				<td><?php echo $reg['correo']; ?></td>
			</tr>
			<?php
			}	
			?>
		</table>
	</div>
</body>
</html>