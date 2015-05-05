<?php
require_once("includes/header.php");
		$correo = $_POST['email'];
		$pass = md5($_POST['pass']);
		$sql = "select * from Persona, Empleado where Persona.correo='$correo' and Persona.idPersona = Empleado.Persona_idPersona and Empleado.password = '$pass'";
		$res = mysql_query($sql,$conexion) or die(mysql_error());
		if(mysql_num_rows($res)!=0){
			if($reg = mysql_fetch_array($res)){
				if($reg['correo'] == $correo && $reg['password'] == $pass ){
					$_SESSION['empleado'] = $reg['idPersona'];
					header("Location: Ventas_index.php");
				}
			}
		}

?>