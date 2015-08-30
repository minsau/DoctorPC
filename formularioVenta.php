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
		    nuevaCelda.innerHTML = "<td class='tbody'><input type='hidden' name='idServicio[" + posicionCampo + "]' value='" +id+"'></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td class='tbody'><input type='text' size='5' name='cantidad[" + posicionCampo + "]' value='1'  class='cantidad' readonly></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td class='tbody'><input type='text' size = '30' name='servicio[" + posicionCampo + "]' placeholder='Servicio' class= 'producto' value='" + descripcion + "' readonly></td>";
		   	nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td class='tbody'><textarea name='descripcion[" + posicionCampo + "]' class='descripcion' cols='5' rows='5' required> </textarea></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td class='tbody'><input type='text' size='10' name='precio[" + posicionCampo + "]' class = 'precio' value = '$" +precio+".00' readonly></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td class='tbody'><input type='text' size='10' name='anticipo[" + posicionCampo + "]' class = 'precio' value='0' onblur='agregarPesos('anticipo[" + posicionCampo+ ")' ></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td class='tbody'><input type='button' value='Eliminar' onclick='eliminarServicio(this)'></td>";
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
	Fecha:<?php echo " ".formatDate(date('Y-m-d')); ?><br>
		<form action="accionVenta.php" method="post"> 
			<input type="hidden" name = "cliente"value="<?php echo $idCliente ?>">
			<input type="hidden" name = "vendedor" value="<?php echo $_SESSION['empleado']?>">
			<table id="tablaCompra" class="center" border="0">
					<tr id="thead">
						<td></td>
						<td class="cantidad">Cantidad	</td>
						<td class="producto">Producto	</td>
						<td class="descripcion">Descripcion</td>
						<td class="precio">Precio</td>
						<td class="precio">Anticipo</td>
						<td></td>
					</tr>
				<tbody>
				</tbody>
			</table>
		<div id="venta">
		<button type="button" onclick="openVentana()"> Agregar Servicio</button>
		<input type="submit" value="Vender">
		</div>
		</form>
	</div>
</body>
</html>
<?php
}
?>
