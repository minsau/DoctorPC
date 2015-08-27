
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
//echo "comienzo<br>";
$sql = "insert into Venta values (null,".$idEmpleado.",".$idCliente.",".$costoTotal.",now(),".$anticipoTotal.")";
$res = mysql_query($sql,$conexion) or die(mysql_error());
//echo "1<br>";
$sql = "SELECT * FROM Venta order by idVenta desc limit 0,1";
$res = mysql_query($sql,$conexion) or die(mysql_error());

$idVenta = mysql_fetch_array($res);

for($i=1;$i<=count($_POST['servicio']);$i++){
	$sql = "insert into Servicio_has_Venta values (null,".$_POST['idServicio']{$i}.",".$idVenta[0].",'".$_POST['descripcion']{$i}."',".$_POST['anticipo']{$i}.",0)";
	$res = mysql_query($sql,$conexion) or die(mysql_error());
}
//echo "2<br>";
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
//echo "3<br>";
$fecha = "Fecha: ".formatDate(date('Y-m-d'));

   for($j = 1; $j<=count($_POST['servicio']);$j++){
   		$data[] = array('servicio'=>$_POST['servicio']{$j},'descripcion'=>$_POST['descripcion']{$j},'precio'=>formatPesos($_POST['precio']{$j}),'anticipo'=>formatPesos($_POST['anticipo']{$j}));
   }
  
   
    $titles[] = array('servicio'=>'Servicio','descripcion'=>'Descripcion','precio'=>'Precio','anticipo'=>'Anticipo');
     
	$pdf=new FPDF();
 	$pdf->AddPage();
 	$pdf->SetFont('Arial','B',16);
 	$pdf->SetXY(130,5);
 	$pdf->Cell(30,5,$fecha); 
 	$pdf->SetXY(10,5);
 	$pdf->Cell(30,5,$nombreCliente); 
 	$pdf->SetXY(10,10);
 	$pdf->Cell(30,5,$nombreEmpleado); 
	$x=20;
	$y=30;

	    foreach($titles as $elemento){
		    foreach($elemento as $llave => $valor){       
		    $pdf->SetXY($x,$y);  
			$pdf->Cell(10,5,$valor); 
		    $x+=50;
		   		 }
	    $y+=10;
	    $x=20;
		} 
	$pdf->SetFont('Arial','',16);

	    foreach($data as $item){
	    	$i=1;
		    foreach($item as $key => $value){       
		    if($i==2){
				    $pdf->SetXY($x,$y);  
					$pdf->MultiCell(70,5,$value); 
				    $x+=70;
			} else {
					$pdf->SetXY($x,$y);  
					$pdf->MultiCell(30,5,$value); 
				    $x+=30;
			}

		    $i++;
		   		 }
	    $y+=30;
	    $x=20;
		} 
		$y +=10;
	$pdf->SetXY(150,$y);
 	$pdf->Cell(30,5,'Total: '.formatPesos($costoTotal));  
 	$y+=10; 
	$pdf->SetXY(150,$y);
 	$pdf->Cell(30,5,'Anticipo: '.formatPesos($anticipoTotal));
 	$y+=10;
 	$restante = $costoTotal - $anticipoTotal;
 	$pdf->SetXY(150,$y);
 	$pdf->Cell(30,5,'Resta: '.formatPesos($restante));  
	
	$pdf->Output(); 

?>

