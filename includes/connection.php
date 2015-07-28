<?php

	$conexion = mysql_connect("localhost","DocPC","nivel200") or die(mysql_error());
	$db = "DoctorPC";
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db($db) or die(mysql_error());
?>
