 <?php 
 require_once("includes/connection.php");

 $search = '';
if(isset($_POST['search'])){
	$search = $_POST['search'];
}
$consulta = "SELECT * FROM Articulo WHERE claveArticulo LIKE '%$search%' ";
$resultado = mysql_query($consulta,$conexion) or die(mysql_error());
//$resultado = mysql_query($conexion,$consulta);
$fila = mysql_fetch_array($resultado);
$total = mysql_num_rows($resultado);
?>

<?php if($total>0 && $search!=''){ ?>
<div align="center">

<form action="#" method="post">	
	<table>
		<tr>
			<td>Nombre</td>
			<td>Apellido Parteno</td>
			<td>Apellido Materno</td>
		</tr>

	<?php do { ?>
	
		<tr>
			
			<input type="hidden" name="id" value="<?php echo $fila['id']; ?>" >
			<input type="hidden" name="tipo" value="articulo" >
			<td>
				<?php echo $fila['idArticulo']; ?>
			</td>
			<td>
				<?php echo $fila['descripcion']; ?>
			</td>
			<td>
				<?php echo $fila['precio']; ?>
			</td>
			<td>
				<input type="submit" value="Modificar" class="button">
			</td>		
		</tr>
	

<?php } while($fila=mysql_fetch_array($resultado)); ?>
</table>
</form>
</div>
<?php } ?>
   
