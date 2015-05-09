<?php
	require_once("includes/header.php");
	$sql = "SELECT * FROM servicio";
	$res = mysql_query($sql,$conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Servicios</title>
</head>
<body>
<div class="container">
	<?php
		if(!$_GET){
	?>
			<table border="0" class="center tabla">
				<thead>
					<tr>
						<td>Id Servicio</td>
						<td>Clave Servicio</td>
						<td class="descripcion">Descripcion</td>
						<td>Precio</td>
					</tr>
				</thead>

				<tbody>
					<?php
						while ($reg = mysql_fetch_array($res)) {
					?>
						<tr>
						<td><?php echo $reg['idServicio']; ?></td>
						<td><?php echo $reg['claveServicio']; ?></td>
						<td class="descripcion"><?php echo $reg['descripcion']; ?></td>
						<td><?php echo formatPesos($reg['precio']); ?></td>						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
	<?php
		}else{
			
			$ubicacion = $_GET['ubicacion'];
			if($ubicacion == 1){
	?>
			<form action="servicios.php?ubicacion=1" method="post">
				<table>
					<tr>
						<td>
							Clave de Servicio: 
						</td>
						<td>
							<input type="text" name="claveServicio" >
						</td>
					</tr>
					<tr>
						<td>
							Descripcion: 
						</td>
						<td>
							<input type="text" name="descripcion" >
						</td>
					</tr>

					<tr>
						<td>
							Precio: 
						</td>
						<td>
							<input type="text" name="precio" >
						</td>
					</tr>
					<tr>
						<td>
						
						</td>
						<td>
							<input type="submit" value="Guardar" >
						</td>
					</tr>																	
				</table>
			</form>
			<?php
				
				if($_POST){
					$sqlInsert = "INSERT INTO servicio(idServicio,claveServicio,descripcion,precio) values
					 (null,'".$_POST['claveServicio']."','".$_POST['descripcion']."','".$_POST['precio']."')";

					$resInsert = mysql_query($sqlInsert,$conexion);
					if(!$resInsert){
						die("Error Insertando el registro: ".mysql_error());
					}else{
						echo "Servicio almacenado";
					}
				}

			}
		}
	?>
</div>
</body>
</html>