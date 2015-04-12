
		 <?php 
 require_once("includes/connection.php");

// $search = '';
if(isset($_POST['search'])){
	$search = $_POST['search'];
}else{
	 $search = '';
}
$consulta = "SELECT * FROM persona,cliente WHERE
			 (nombresPersona LIKE '%$search%'
			 OR aPaterno LIKE '%$search%'
			 OR aMaterno LIKE '%$search%'
			 OR correo LIKE '%$search%'
			 OR telefono LIKE '%$search%') 
			 AND (persona.idPersona = cliente.Persona_idPersona)";
$resultado = mysql_query($consulta,$conexion) or die(mysql_error());
//$resultado = mysql_query($conexion,$consulta);
$fila = mysql_fetch_array($resultado);
$total = mysql_num_rows($resultado);
?>

<?php if($total>0 && $search!=''){ ?>
<div align="center">


	<table border="1">
		

	<?php do { ?>
	
		<tr>
			<td>
				<?php echo $fila['idPersona']; ?>
			</td>
			<td>
				<?php echo $fila['nombresPersona']." ".$fila['aPaterno']." ".$fila['aMaterno']; ?>
			</td>
			<td>
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
	</div>
