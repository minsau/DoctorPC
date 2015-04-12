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
		function agregarUsuario(opc,precio) {
		    nuevaFila = document.getElementById("tablaCompra").insertRow(-1);
		    nuevaFila.id = posicionCampo;
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='text' size='15' name='cantidad[" + posicionCampo + "]' value='1'></td>";
		    if(opc == 1){
		    	nuevaCelda = nuevaFila.insertCell(-1);
		    	nuevaCelda.innerHTML = "<td><select name='opcion[" + posicionCampo + "]' placeholder='Articulo'>"+
		    	<?php 
		    		$sqlArti = "SELECT * FROM articulo";
		    		$resArti = mysql_query($sqlArti,$conexion);
		    		while($regArti = mysql_fetch_array($resArti)){
		    	?>
		    	"<option><?php echo $regArti['claveArticulo'];?></option>"+

		    	<?php
		    		}
		    	?>
		    	"</select></td>";
			}else{
		    	nuevaCelda = nuevaFila.insertCell(-1);
		    	nuevaCelda.innerHTML = "<td><select  name='opcion[" + posicionCampo + "]' placeholder='Servicio'>"+ 
		    	<?php 
		    		$sqlSer = "SELECT * FROM servicio";
		    		$resSer = mysql_query($sqlSer,$conexion);
		    		while($regSer = mysql_fetch_array($resSer)){
		    	?>
		    	"<option><?php echo $regSer['claveServicio'];?></option>"+

		    	<?php
		    		}
		    	?>
		    	"</select></td>";
		   	}
		   	nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='text' size='10' name='descripcion[" + posicionCampo + "]'></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='text' size='10' name='precio[" + posicionCampo + "]' value = '" +precio+"'></td>";
		    nuevaCelda = nuevaFila.insertCell(-1);
		    nuevaCelda.innerHTML = "<td><input type='button' value='Eliminar' onclick='eliminarUsuario(this)'></td>";
		    posicionCampo++;
		}
		function eliminarUsuario(obj) {
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
			</tr>
		</table>
		<button onclick="openVentana()"> Agregar Articulo</button>
		<button onclick="agregarUsuario(2)"> Agregar Servicio</button>
	</div>
</body>
</html>
<?php
}
?>