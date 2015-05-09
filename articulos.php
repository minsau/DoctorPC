<?php
	require_once("includes/header.php");
	$sql = "SELECT * FROM articulo";
	$res = mysql_query($sql,$conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Articulos</title>
</head>
<body>
<div class="container">
	<?php
		if(!$_GET){
	?>
			<table border="0" class="center tabla">
				<thead>
					<tr>
						<td>Id Articulo</td>
						<td>Clave Articulo</td>
						<td class="descripcion">Descripcion</td>
						<td>Precio</td>
					</tr>
				</thead>

				<tbody>
					<?php
						while ($reg = mysql_fetch_array($res)) {
					?>
						<tr>
						<td><?php echo $reg['idArticulo']; ?></td>
						<td><?php echo $reg['claveArticulo']; ?></td>
						<td class="descripcion"><?php echo $reg['descripcion']; ?></td>
						<td><?php echo formatPesos($reg['precio']); ?></td>
						</tr>
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
			<form action="articulos.php?ubicacion=1" method="post">
				<table>
					<tr>
						<td>
							Clave de Articulo: 
						</td>
						<td>
							<input type="text" name="claveArticulo" >
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
					$sqlInsert = "INSERT INTO articulo(idArticulo,claveArticulo,descripcion,precio) values
					 (null,'".$_POST['claveArticulo']."','".$_POST['descripcion']."','".$_POST['precio']."')";

					$resInsert = mysql_query($sqlInsert,$conexion);
					if(!$resInsert){
						die("Error Insertando el registro: ".mysql_error());
					}else{
						echo "Articulo almacenado";
					}
				}

			}
		}
	?>
</div>
</body>
</html>