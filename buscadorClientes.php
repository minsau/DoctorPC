
<?php 
 require_once("includes/connection.php");

// $search = '';
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
//$resultado = mysql_query($conexion,$consulta);
$fila = mysql_fetch_array($resultado);
$total = mysql_num_rows($resultado);
?>

<?php if($total>0 && $search!=''){ ?>
<div align="center">


	<table border="0" class="tabla busqueda">
		

	<?php do { ?>
	
		<tr>
			<td>
				<?php echo $fila['idPersona']; ?>
			</td>
			<td class="nombresBusqueda">
				<?php echo $fila['nombresPersona']." ".$fila['aPaterno']." ".$fila['aMaterno']; ?>
			</td>
			<td class="correo ">
				<?php echo $fila['correo']; ?>
			</td>
			<td>
				<a href="formularioVenta.php?idPersona=<?php echo $fila['idPersona']; ?>" > Ir </a>
			</td>
			
		</tr>
	

<?php } while($fila=mysql_fetch_array($resultado)); ?>
</table>

</div>
<?php } ?>
	<div id="Sinresultados" ><ul><li><a href="formularioNuevoCliente.php">No esta en la lista</a></li></ul> </div>
	</div>
