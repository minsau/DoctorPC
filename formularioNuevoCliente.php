<?php
	require_once("includes/header.php");
	require_once("includes/connection.php");
?>
<html>
	<head>
		<title>Nuevo Cliente</title>
			<link rel="stylesheet" type="text/css" href="includes/style.css">
			<script type="text/javascript">
				function mostrarNombres(){
						document.getElementById('infoNombres').style.display = 'block';
				}

				function ocultarNombres(){
                  document.getElementById('infoNombres').style.display = 'none';
            }

				function mostrarTel(){
                  document.getElementById('infoTel').style.display = 'block';
            }

            function ocultarTel(){
                  document.getElementById('infoTel').style.display = 'none';
            }
				
				function mostrarCorreo(){
                  document.getElementById('infoCorreo').style.display = 'block';
            }

            function ocultarCorreo(){
                  document.getElementById('infoCorreo').style.display = 'none';
            }

				function mostrarDireccion(){
                  document.getElementById('infoDireccion').style.display = 'block';
            }

            function ocultarDireccion(){
                  document.getElementById('infoDireccion').style.display = 'none';
            }

			</script> 
	</head>
	<body>
		<div class="container">
			<div id="form-NuevoCliente" class="center">
				<form action="#" method="post" formvalidate>
					<table>
						<tr>
							<td>Nombre:  </td>
							<td><input type="text" name="nombre" value="" placeholder="Ingrese nombres " onfocus = "mostrarNombres()"  onblur = "ocultarNombres()" required></td>
						</tr>
						<tr>
							<td>Telefono:  </td>
							<td><input type="text" name="tel" value="" placeholder="Ingrese el numero telefonico " onfocus = "mostrarTel()"  onblur = "ocultarTel()" required></td>
						</tr>
						<tr>
							<td>Correo:  </td>
							<td><input type="email" name="email" value="" placeholder="Ingrese correo" onfocus = "mostrarCorreo()"  onblur = "ocultarCorreo()" required></td>
						</tr>
						<tr>
							<td>Direccion:  </td>
							<td><input type="text" name="direccion" value="" placeholder="Ingrese la direccion " onfocus = "mostrarDireccion()"  onblur = "ocultarDireccion()" required></td>
						</tr>
						<tr>
							<td></td><td><input type="submit" value="Enviar"/></td>
						</tr>
					</table>
				</form>
			</div>

			<div class="info newcostumer center" id="infoNombres" style='display:none' >Ingresa minimo un nombre con 2 apellidos. Si hay mas de 2 apellidos solo ingresa 2. </div>
			<div class="info newcostumer center" id="infoTel" style='display:none' > Ingresa un numero telefonico </div>
			<div class="info newcostumer center" id="infoCorreo" style='display:none' > El correo debe tener un formato similar a example@example.com, si el cliente no tiene correo electronico anote, sincorreo@sc.com</div>
			<div class="info newcostumer center" id="infoDireccion" style='display:none' > El formato de la direccion es libre, pero debe servir como referencia para futuras consultas. </div>


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
					$id = $reg2['idPersona'];
					$sql = "INSERT INTO Cliente values ('$id',now())";
					$res = mysql_query($sql,$conexion) or die(mysql_error());
				}
			?>
	</div>	
</body>
</html>
