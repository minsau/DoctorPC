
		 <?php 
 require_once("includes/connection.php");

// $search = '';
if(isset($_POST['search'])){
	$search = $_POST['search'];
}else{
	 $search = '';
}
$consulta = "SELECT * FROM servicio WHERE claveServicio LIKE '%$search%' ";
$resultado = mysql_query($consulta,$conexion) or die(mysql_error());
//$resultado = mysql_query($conexion,$consulta);
$fila = mysql_fetch_array($resultado);
$total = mysql_num_rows($resultado);
?>

<?php if($total>0 && $search!=''){ ?>
<div align="center">


	<table>
		<tr>
			<td>Id Servicio</td>
			<td>Clave Servicio</td>
			<td>Precio</td>
			<td></td>
		</tr>

	<?php do { ?>
	
		<tr>
			
			
			<td class="center">
				<?php echo $fila['idServicio']; ?>
			</td>
			<td>
				<?php echo $fila['claveServicio']; ?>
			</td>
			<td>
				<?php echo $fila['precio']; ?>
			</td>
			<td>
			
				<button onclick="agregarServicio(<?php echo $fila['idServicio']?>,'<?php echo $fila['claveServicio']?>',<?php echo $fila['precio']?>)"> Agregar Servicio </button>
			
			</td>		
		</tr>
	

<?php } while($fila=mysql_fetch_array($resultado)); ?>
</table>

</div>
<?php } ?>
	</div>
