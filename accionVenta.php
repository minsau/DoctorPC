
<?php
require_once("includes/header.php");
require_once("includes/fpdf/fpdf.php");

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
$nombreCliente = $nombreCliente;

$sql = "SELECT * FROM Persona  where idPersona = $idEmpleado";
$res = mysql_query($sql,$conexion) or die(mysql_error());
$reg = mysql_fetch_array($res) or die(mysql_error());

$nombreEmpleado = "Atendio: ".$reg['nombresPersona']." ".$reg['aPaterno']." ".$reg['aMaterno'];
$nombreEmpleado = $nombreEmpleado;

$fecha = "Fecha: ".formatDate(date('Y-m-d'));

   for($j = 1; $j<=count($_POST['servicio']);$j++){
   		$data[] = array('servicio'=>$_POST['servicio']{$j},'descripcion'=>$_POST['descripcion']{$j},'precio'=>formatPesos($_POST['precio']{$j}),'anticipo'=>formatPesos($_POST['anticipo']{$j}));
   }
  
   
    $titles[] = array('servicio'=>'Servicio','descripcion'=>'Descripcion','precio'=>'Precio','anticipo'=>'Anticipo');
     
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nota de venta</title>
	<script type="text/javascript">
function imprSelec(muestra){
	var ficha=document.getElementById(muestra);
	var ventimp=window.open('','popimpr');
	ventimp.document.write(ficha.innerHTML);
	ventimp.document.close();
	ventimp.print();
}
</script>
</head>
<body>
<div class="container">
<div id="nota">
<?php
	echo $fecha."			<br>".$nombreEmpleado."<br>".$nombreCliente;
?>
<table border = "1" class="tabla center">

	<thead>
		<tr>
			<td>
				Servicio
			</td>
			<td class='descripcion'>
				Descripcion
			</td>
			<td>
				Precio
			</td>

			<td>
				Anticipo
			</td>
		</tr>
	</thead>
	<?php
	    foreach($data as $item){
	?>
	<tbody>
		<tr>
	<?php
		    foreach($item as $key => $value){       
					echo "<td >".$value."</td>";
		   		 }
	?>

	</tr>
	</tbody>
	<?php
		} 
	?>
	</table>

	<?php
		echo "Total: ".formatPesos($costoTotal)."<br>Anticipo: ".formatPesos($anticipoTotal)."<br>Restante: ".formatPesos(($costoTotal - $anticipoTotal))."<br>";
	?>
	</div>
<a href="javascript:imprSelec('nota')">Imprimir Tabla</a>
</div>
</body>
</html>