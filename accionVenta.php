
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


   /* require_once("includes/src/Cezpdf.php");
    $pdf = new Cezpdf('a4');
    $pdf->selectFont('fonts/Times-Roman.afm');
    $datacreator = array (
                        'Title'=>'Nota de Venta',
                        'Author'=>'DoctorPC',
                        'Subject'=>'Venta',
                        'Creator'=>'minsau',
                        'Producer'=>'minsau2@gmail.com'
                        );
    $pdf->addInfo($datacreator);
    */ 
   for($j = 1; $j<=count($_POST['servicio']);$j++){
   		$data[] = array('servicio'=>$_POST['servicio']{$j},'descripcion'=>$_POST['descripcion']{$j},'precio'=>$_POST['precio']{$j},'anticipo'=>$_POST['anticipo']{$j});
   }
  
     
    $titles = array('servicio'=>'<b>Servicio</b>','descripcion'=>'<b>Descripcion</b>','precio'=>'<b>Precio</b>','anticipo'=>'Anticipo');
     
    /*$pdf->ezText("<b>Nota de venta</b>\n",16);
    $pdf->ezText("Listado de Meses\n",12);
    $pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"),10);
    $pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n",10);
    $pdf->ezTable($data,$titles,'',$options );
    $pdf->ezText("\n\n\n",10);
    
    $pdf->ezStream();
	

	$pdf = new PDF();
 
$pdf->AddPage();
$x=10;
$y=20;
$pdf->SetXY($x,$y);
$pdf->Output(); 
*/





?>

