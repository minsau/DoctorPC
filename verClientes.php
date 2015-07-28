	
	<?php
	require_once("includes/header.php");
	$sql = "SELECT * FROM Persona,Cliente where Persona.idPersona = Cliente.Persona_idPersona";
	$res = mysql_query($sql,$conexion) or die(mysql_error());
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Clientes</title>
</head>
<body>
	<div class="container">
		<table border="0" class="tabla">
		<thead>
			<tr>
				<td class="precio">
					Id 
				</td>
				<td class="nombre">
					Nombre
				</td>
				<td class="direccion">
					Direccion
				</td>
				<td>
					Telefono
				</td>
				<td>
					Correo
				</td>
				<td>
					Primer Compra
				</td>
			</tr>
		</thead>
		<tbody>
		<?php
		while ($reg = mysql_fetch_array($res)) {
		?>
		
		<tr>
			 <td><?php echo $reg['idPersona'] ?></td>
			 <td class="nombre"><?php echo $reg['nombresPersona']." ".$reg['aPaterno']." ".$reg['aMaterno'] ?></td>
			 <td class="direccion"><?php echo $reg['direccion'] ?></td>
			 <td><?php echo $reg['telefono'] ?> </td>
			 <td><?php echo $reg['correo'] ?></td>
			 <td><?php echo formatDate($reg['fechaPrimerCompra']); ?></td> 
		</tr>
		<?php
		}
		?>
		</tbody>
		</table>
	</div>

</body>
</html>
