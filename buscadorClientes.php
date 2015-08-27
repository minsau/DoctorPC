<?php 
	 require_once("includes/connection.php");
	if(isset($_POST['search'])){
		$search = $_POST['search'];
	}else{
	 	$search = '';
	}
	$consulta = "SELECT * FROM Persona,Cliente WHERE
			 (nombresPersona LIKE '%$search%'
			 OR aPaterno LIKE '%$search%'
			 OR aMaterno LIKE '%$search%'
			 OR correo LIKE '%$search%'
			 OR telefono LIKE '%$search%') 
			 AND (Persona.idPersona = Cliente.Persona_idPersona)";
	$resultado = mysql_query($consulta,$conexion) or die(mysql_error());
	$fila = mysql_fetch_array($resultado);
	$total = mysql_num_rows($resultado);
?>

<?php if($total>0 && $search!=''){ ?>
	<div align="center">
		<table border="0" class="tabla busqueda">
			<?php do { ?>
				<tr onClick="location.href = 'formularioVenta.php?idPersona=<?php echo $fila['idPersona']; ?>' ">
					<td class="nombresBusqueda">
						<?php echo $fila['nombresPersona']." ".$fila['aPaterno']." ".$fila['aMaterno']; ?>
					</td>
					<td class="correo ">
						<?php echo $fila['correo']; ?>
					</td>
					<td style= "padding-left: 25px;">
						<?php echo $fila['telefono']; ?>
					</td>
				</tr>

			<?php } while($fila=mysql_fetch_array($resultado)); ?>
		</table>
	</div>
<?php } ?>
<div id="Sinresultados" ><ul><li><a href="formularioNuevoCliente.php">No esta en la lista</a></li></ul> </div>
