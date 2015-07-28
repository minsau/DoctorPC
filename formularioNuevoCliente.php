<?php
require_once("includes/header.php");
require_once("includes/connection.php");
?>
<html>
<head>
	<title>Nuevo Cliente</title>
	<link rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<body>
	<div class="container">
		<div id="form-NuevoCliente" class="center">
			<form action="#" method="post" formvalidate>
				<table>
					<tr>
						<td>Nombre:  </td>
						<td><input type="text" name="nombre" value="" placeholder="Ingrese nombres " required></td>
					</tr>

					<tr>
						<td>Telefono:  </td>

						<td><input type="text" name="tel" value="" placeholder="Ingrese el numero telefonico " required></td>
					</tr>

					<tr>
						<td>Correo:  </td>

						<td><input type="email" name="email" value="" placeholder="Ingrese correo" required></td>
			
					</tr>
					<tr>
						<td>Direccion:  </td>

						<td><input type="text" name="direccion" value="" placeholder="Ingrese la direccion " required></td>
					</tr>
					<tr>
						<td></td><td><input type="submit" value="Enviar"/></td>
					</tr>
				</table>
			</form>
		</div>
		
			<?php
				if($_POST){
					$nombres = "";
					$aPaterno = "";
					$aMaterno = "";
					$nombreCompleto = explode (" ",$_POST['nombre']);
					$tam = count($nombreCompleto);
					for($i=0; $i< $tam; $i++){
						if($i == ($tam-2)){
							$aPaterno = $nombreCompleto{$i};
						}
						else if($i == ($tam-1)){
							$aMaterno = $nombreCompleto{$i};
						}else if($i < ($tam-2) ){
							$nombres = $nombres." ".$nombreCompleto{$i};
						}
					
					}
					$telefono = $_POST['tel'];
					$correo = $_POST['email'];
					$direccion = $_POST['direccion'];
					$sql = "INSERT INTO Persona values (null,'$nombres','$aPaterno','$aMaterno','$direccion','$telefono','$correo')";
					$res = mysql_query($sql,$conexion) or die(mysql_error());
					
					$sql2 = "SELECT idPersona FROM Persona order by idPersona desc limit 0,1 ";
					$res2 = mysql_query($sql2,$conexion) or die(mysql_error());
					$reg2 = mysql_fetch_array($res2);
					
					
					$sql = "INSERT INTO Cliente values ('$id',now())";
					$res = mysql_query($sql,$conexion) or die(mysql_error());
				}
			?>
		
	</div>	
</body>
</html>
