<?php
session_start();
require_once("includes/connection.php");
require_once("includes/header.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio de Sesion DoctorPC</title>
	<link rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<body>
	<div class="container">

	<?php
		if(!$_POST){
	?>
	<div class="form center">
		<form action="#" method="post" >
			<table>
				<tr>
					<td>
						Correo: 
					</td>
					<td>
						<input type="e-mail" name="email" placeholder="Ingresa tu correo" validate>
					</td>
				</tr>

				<tr>
					<td>
						Contraseña: 
					</td>
					<td>
						<input type="password" name="pass" placeholder="Ingresa tu Contraseña">
					</td>

					<tr>
					<td></td>
					<td><input type="submit" name="" value="Entrar"></td>
				</tr>
				</tr>
			</table>
		</form>

	<?php
		}else{
			$correo = $_POST['email'];
			$pass = md5($_POST['pass']);
			$sql = "select * from Persona, Empleado where Persona.correo='$correo' and Persona.idPersona = Empleado.Persona_idPersona and Empleado.password = '$pass'";
			$res = mysql_query($sql,$conexion) or die(mysql_error());
			if(mysql_num_rows($res)!=0){
				if($reg = mysql_fetch_array($res)){
					if($reg['correo'] == $correo && $reg['password'] == $pass ){
						$_SESSION['empleado'] = $reg['idPersona'];
						header("Location: Ventas_index.php");
					}
				}
			}
		}
	?>
	</div>
	</div>
</body>
</html>

