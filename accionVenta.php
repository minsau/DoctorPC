
<?php
require_once("includes/connection.php");
require_once("includes/fpdf/fpdf.php");
$idEmpleado = $_POST['vendedor'];
$idCliente = $_POST['cliente'];


$costoTotal = 0;
$anticipoTotal = 0;

for($i=1;$i <= count($_POST['precio']);$i++){
	$costoTotal+=$_POST['precio']{$i};
	$anticipoTotal+=$_POST['anticipo']{$i};

}

$sql = "insert into venta values (null,".$idEmpleado.",".$idCliente.",".$costoTotal.",now(),".$anticipoTotal.")";
$res = mysql_query($sql,$conexion) or die(mysql_error());

$sql = "SELECT * FROM venta order by idVenta desc limit 0,1";
$res = mysql_query($sql,$conexion) or die(mysql_error());

$idVenta = mysql_fetch_array($res);

for($i=1;$i<=count($_POST['servicio']);$i++){
	$sql = "insert into servicio_has_venta values (null,".$_POST['idServicio']{$i}.",".$idVenta[0].",'".$_POST['descripcion']{$i}."',".$_POST['anticipo']{$i}.",0)";
	$res = mysql_query($sql,$conexion) or die(mysql_error());
}

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

$fecha = "Fecha: ".date('d-m-y');

   for($j = 1; $j<=count($_POST['servicio']);$j++){
   		$data[] = array('servicio'=>$_POST['servicio']{$j},'descripcion'=>$_POST['descripcion']{$j},'precio'=>$_POST['precio']{$j},'anticipo'=>$_POST['anticipo']{$j});
   }
  
   
    $titles[] = array('servicio'=>'Servicio','descripcion'=>'Descripcion','precio'=>'Precio','anticipo'=>'Anticipo');
     
	$pdf=new FPDF();
 	$pdf->AddPage();
 	$pdf->SetFont('Arial','B',16);
 	$pdf->SetXY(150,5);
 	$pdf->Cell(30,5,$fecha); 
 	$pdf->SetXY(10,5);
 	$pdf->Cell(30,5,$nombreCliente); 
 	$pdf->SetXY(10,10);
 	$pdf->Cell(30,5,$nombreEmpleado); 
	$x=30;
	$y=30;

	    foreach($titles as $elemento){
		    foreach($elemento as $llave => $valor){       
		    $pdf->SetXY($x,$y);  
			$pdf->Cell(10,5,$valor); 
		    $x+=40;
		   		 }
	    $y+=10;
	    $x=30;
		} 
	$pdf->SetFont('Arial','',16);
	    foreach($data as $item){
		    foreach($item as $key => $value){       
		    $pdf->SetXY($x,$y);  
			$pdf->Cell(10,5,$value); 
		    $x+=40;
		   		 }
	    $y+=10;
	    $x=30;
		} 
		$y +=10;
	$pdf->SetXY(150,$y);
 	$pdf->Cell(30,5,'Total: '.$costoTotal);  
 	$y+=10; 
	$pdf->SetXY(150,$y);
 	$pdf->Cell(30,5,'Anticipo: '.$anticipoTotal);
 	$y+=10;
 	$restante = $costoTotal - $anticipoTotal;
 	$pdf->SetXY(150,$y);
 	$pdf->Cell(30,5,'Resta: '.$restante);  
	
	$pdf->Output(); 

?>
