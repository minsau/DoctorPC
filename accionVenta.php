
<?php
require_once("includes/connection.php");
require_once("includes/fpdf/fpdf.php");
require_once("includes/functions.php");
$idEmpleado = $_POST['vendedor'];
$idCliente = $_POST['cliente'];


$costoTotal = 0;
$anticipoTotal = 0;

for($i=1;$i <= count($_POST['precio']);$i++){
	$costoTotal+=$_POST['precio']{$i};
	$anticipoTotal+=$_POST['anticipo']{$i};

}

/*$sql = "insert into venta values (null,".$idEmpleado.",".$idCliente.",".$costoTotal.",now(),".$anticipoTotal.")";
$res = mysql_query($sql,$conexion) or die(mysql_error());

$sql = "SELECT * FROM venta order by idVenta desc limit 0,1";
$res = mysql_query($sql,$conexion) or die(mysql_error());

$idVenta = mysql_fetch_array($res);

for($i=1;$i<=count($_POST['servicio']);$i++){
	$sql = "insert into servicio_has_venta values (null,".$_POST['idServicio']{$i}.",".$idVenta[0].",'".$_POST['descripcion']{$i}."',".$_POST['anticipo']{$i}.",0)";
	$res = mysql_query($sql,$conexion) or die(mysql_error());
}
*/
$sql = "SELECT * FROM Persona  where idPersona = $idCliente";
$res = mysql_query($sql,$conexion) or die(mysql_error());
$reg = mysql_fetch_array($res) or die(mysql_error());

$nombreCliente = "Cliente: ".$reg['nombresPersona']." ".$reg['aPaterno']." ".$reg['aMaterno'];
$nombreCliente = utf8_decode($nombreCliente);

$sql = "SELECT * FROM Persona  where idPersona = $idEmpleado";
$res = mysql_query($sql,$conexion) or die(mysql_error());
$reg = mysql_fetch_array($res) or die(mysql_error());

$nombreEmpleado = "Atendio: ".$reg['nombresPersona']." ".$reg['aPaterno']." ".$reg['aMaterno'];
$nombreEmpleado = utf8_decode($nombreEmpleado);

$fecha = "Fecha: ".formatDate(date('Y-m-d'));

   for($j = 1; $j<=count($_POST['servicio']);$j++){
   		$data[] = array('servicio'=>$_POST['servicio']{$j},'descripcion'=>$_POST['descripcion']{$j},'precio'=>formatPesos($_POST['precio']{$j}),'anticipo'=>formatPesos($_POST['anticipo']{$j}));
   }
    
    $titles[] = array('servicio'=>'Servicio','descripcion'=>'Descripcion','precio'=>'Precio','anticipo'=>'Anticipo');
     
?>

<!DOCTYPE html>
<html>
<head>
	<title>Imprimir Nota</title>
</head>
<body>

</body>
</html>
