
<?php 
	require_once("includes/connection.php");
	if(isset($_POST['search'])){
		$search = $_POST['search'];
	}else{
		 $search = '';
	}
	$consulta = "SELECT * FROM Servicio WHERE claveServicio LIKE '%$search%' ";
	$resultado = mysql_query($consulta,$conexion) or die(mysql_error());
	$fila = mysql_fetch_array($resultado);
	$total = mysql_num_rows($resultado);
?>

<?php if($total>0 && $search!=''){ ?>
	<div align="center">
		<table class="tabla busqueda">
		<?php do { ?>
			<tr onclick="agregarServicio(<?php echo $fila['idServicio']?>,'<?php echo $fila['claveServicio']?>',<?php echo $fila['precio']?>)">
				<td class="center">
					<?php echo $fila['claveServicio']; ?>
				</td>
				<td>
					<?php echo $fila['descripcion']; ?>
				</td>
				<td>
					<?php echo "$".$fila['precio'].".00"; ?>
				</td>
			</tr>
		<?php } while($fila=mysql_fetch_array($resultado)); ?>
	</table>
	</div>
<?php } ?>
