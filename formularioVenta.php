<?php
session_start();
require_once("includes/connection.php");
require_once("includes/header.php");
require_once("buscarHoras.php");
	if(!isset($_SESSION['empleado'])){
		echo "<script type='text/javascript' >
        alert('No estas logueado');
      </script>
      ";
		
	}else{
	$sql = "SELECT * FROM Persona where idPersona='".$_SESSION['empleado']."'";
	$res = mysql_query($sql,$conexion) or die(mysql_error());
	$reg = mysql_fetch_array($res) or die(mysql_error());
	$idCliente = $_GET['idPersona'];
	$sql2 = "SELECT * FROM Persona where idPersona='$idCliente'";
	$res2 = mysql_query($sql2,$conexion) or die(mysql_error());
	$reg2 = mysql_fetch_array($res2) or die(mysql_error());
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Venta</title>
	<link rel="stylesheet" type="text/css" href="includes/style.css">
	<script type="text/javascript" src="includes/jquery.js"></script>
	<script type="text/javascript" src="includes/ajax.js"></script>
	<script type="text/javascript" src="includes/script.js"></script>
	<script type="text/javascript">
		var posicionCampo = 1;
		function agregarServicio(id, descripcion, precio) {
		    nuevaFila = document.getElementById("tablaCompra").insertRow(-1);
		    nuevaFila.id = posicionCampo;
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='hidden' name='idServicio[" + posicionCampo + "]' value='" +id+"'></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='text' size='15' name='cantidad[" + posicionCampo + "]' value='1'></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='text' name='servicio[" + posicionCampo + "]' placeholder='Servicio' value='" + descripcion + "'></td>";
		   	nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><textarea name='descripcion[" + posicionCampo + "]' cols='10' rows='5' > </textarea></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='text' size='10' name='precio[" + posicionCampo + "]' value = '" +precio+"'></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='text' size='10' name='anticipo[" + posicionCampo + "]' value='0' ></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='button' value='Eliminar' onclick='eliminarServicio(this)'></td>";
		    posicionCampo++;
		}
		function eliminarServicio(obj) {
		    var oTr = obj;
		    while(oTr.nodeName.toLowerCase() != 'tr') {
		        oTr=oTr.parentNode;
		    }
		    var root = oTr.parentNode;
		    root.removeChild(oTr);

		}
	</script>
</head>
<body>
	<div class="container">

	Cliente: <?php echo $reg2['nombresPersona']." ".$reg2['aPaterno']." ".$reg2['aMaterno']."<br/>" ;?>
	Atendió:<?php echo "  ".$reg['nombresPersona']." ".$reg['aPaterno']." ".$reg['aMaterno']."<br>"; ?>
	Fecha:<?php echo " ".date('d-m-y'); ?><br>
		<form action="accionVenta.php" method="post"> 
		<input type="hidden" name = "cliente"value="<?php echo $idCliente ?>">
		<input type="hidden" name = "vendedor" value="<?php echo $_SESSION['empleado']?>">
		
		<table id="tablaCompra" >
			<tr>
				<td>
					Cantidad
				</td>
				
				<td>
					Producto	
				</td>
				<td>
					Descripcion
				</td>
				<td>
					Precio
				</td>
				<td>
					Anticipo
				</td>
			</tr>
		</table>
		<button type="button" onclick="openVentana()"> Agregar Servicio</button>
		<input type="submit" value="Vender">
		</form>
	</div>
</body>
</html>
<?php
}
?>