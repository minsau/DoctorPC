<?php
	require_once("includes/connection.php");
	require_once("includes/fpdf/fpdf.php");
	require_once("includes/functions.php");
	$idEmpleado = $_POST['vendedor'];
	$idCliente = $_POST['cliente'];
	$cantidades = $_POST['cantidad'];
	$servicios = $_POST['servicio'];
	$descripciones = $_POST['descripcion'];

	$costoTotal = 0;
	$anticipoTotal = 0;

	for($i=1;$i <= count($_POST['precio']);$i++){
   	$precio = explode("$",$_POST['precio']{$i});
		$costoTotal+=$precio[1];
   	$anticipoTotal+=$_POST['anticipo']{$i};
	}
	echo "Costo Total: $costoTotal<br>";
	echo "Anticipo Total: $anticipoTotal";
	echo "<br>";
	
	print_r($cantidades);
	echo "<br>";
	print_r($servicios);
	echo "<br>";
	print_r($descripciones);
?>

