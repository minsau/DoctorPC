<?php
	require_once("includes/header.php");
	$sql = "SELECT 
			venta.idVenta,
			servicio.claveServicio,
			servicio.precio,
			venta.costoTotal,
			venta.fecha,
			venta.anticipoGeneral
			FROM servicio_has_venta,venta,servicio 
			where
			servicio_has_venta.Venta_idVenta = venta.idVenta and 
			servicio_has_venta.Servicio_idServicio = servicio.idServicio 
			group by venta.idVenta";

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
						persona.nombresPersona,
						persona.aPaterno,
						persona.aMaterno
						FROM persona,venta
						where
						venta.idVenta = '".$reg['idVenta']." ' and 
						venta.Cliente_Persona_idPersona = persona.idPersona";
		$resCliente = mysql_query($sqlCliente,$conexion) or die(mysql_error());
		$regCliente = mysql_fetch_array($resCliente);
		$sqlEmpleado = "SELECT 
						persona.nombresPersona,
						persona.aPaterno,
						persona.aMaterno
						FROM persona,venta
						where
						venta.idVenta = '".$reg['idVenta']." ' and 
						venta.Empleado_Persona_idPersona = persona.idPersona";
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