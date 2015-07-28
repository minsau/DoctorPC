<?php
	require_once("includes/header.php");
	$sql = "SELECT 
			Venta.idVenta,
			Servicio.claveServicio,
			Servicio.precio,
			Venta.costoTotal,
			Venta.fecha
			FROM Servicio_has_Venta,Venta,Servicio 
			where
			Servicio_has_Venta.Venta_idVenta = Venta.idVenta and 
			Servicio_has_Venta.Servicio_idServicio = Servicio.idServicio 
			group by Venta.idVenta";

	$res = mysql_query($sql,$conexion) or die(mysql_error());	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ventas</title>
</head>
<body>
<div class="container">
<table class="tabla link-to">
	<thead>
		
		<td>Id</td>
		<td>Vendio</td>
		<td>Cliente</td>
		
		<td>Precio </td>
		
		<td>Fecha de Venta </td>
		<td>Anticipo</td>
	</thead>
	<tbody>
	<?php
	while ($reg = mysql_fetch_array($res)) {
		$sqlCliente = "SELECT 
						Persona.nombresPersona,
						Persona.aPaterno,
						Persona.aMaterno
						FROM Persona,Venta
						where
						Venta.idVenta = '".$reg['idVenta']." ' and 
						Venta.Cliente_Persona_idPersona = Persona.idPersona";
		$resCliente = mysql_query($sqlCliente,$conexion) or die(mysql_error());
		$regCliente = mysql_fetch_array($resCliente);
		$sqlEmpleado = "SELECT 
						Persona.nombresPersona,
						Persona.aPaterno,
						Persona.aMaterno
						FROM Persona,Venta
						where
						Venta.idVenta = '".$reg['idVenta']." ' and 
						Venta.Empleado_Persona_idPersona = Persona.idPersona";
		$resEmpleado = mysql_query($sqlEmpleado,$conexion) or die(mysql_error());
		$regEmpleado = mysql_fetch_array($resEmpleado);	
	?>	
		<tr>
			<td><?php echo $reg['idVenta'] ?></td>
			<td class="nombre"><?php echo $regEmpleado['nombresPersona']." ".$regEmpleado['aPaterno']." ".$regEmpleado['aMaterno']; ?></td>
			<td class="nombre"><?php echo $regCliente['nombresPersona']." ".$regCliente['aPaterno']." ".$regCliente['aMaterno']; ?></td>
			
			<td class="precio"><?php echo formatPesos($reg['precio']); ?></td>
			
			<td><?php echo formatDate($reg['fecha']); ?></td>
			<td class="precio"><?php echo formatPesos($reg['anticipoGeneral']); ?></td>
		</tr>
		<?php
}
		?>
	</tbody>
</table>
</div>
</body>
</html>
