<?php
	$conexion = mysql_connect("localhost","root","esasistemas") or die(mysql_error());
	$db = "DocPC";
	mysql_select_db($db) or die(mysql_error());
?>