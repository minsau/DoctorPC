<?php
	require_once("includes/connection.php");
	$sql = "SELECT * FROM Venta";
	$res = mysql_query($sql,$conexion) or die(mysql_error());
	while ($reg = mysql_fetch_array($res)) {