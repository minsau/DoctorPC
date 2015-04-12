		<div class="modal">
			
			<div class="form">
			<div class="cerrar"><a href="javascript:closeVentana()">Cerrar X</a></div>
				<h1>Formulario Login</h1>
				<hr>
				<form action="" method="post">
					Ingresa el nombre: 
					<input type="text" name="search" id="search" class="s2">
				</form>
				<div id="resultados"></div>				
			</div>
				</div>

		
	


		 <?php 
 require_once("includes/connection.php");

// $search = '';
if(isset($_POST['search'])){
	$search = $_POST['search'];
}else{
	 $search = '';
}
$consulta = "SELECT * FROM Articulo WHERE claveArticulo LIKE '%$search%' ";
$resultado = mysql_query($consulta,$conexion) or die(mysql_error());
//$resultado = mysql_query($conexion,$consulta);
$fila = mysql_fetch_array($resultado);
$total = mysql_num_rows($resultado);
?>

<?php if($total>0 && $search!=''){ ?>
<div align="center">


	<table>
		<tr>
			<td>Nombre</td>
			<td>Apellido Parteno</td>
			<td>Apellido Materno</td>
		</tr>

	<?php do { ?>
	
		<tr>
			
			<input type="hidden" name="id" value="<?php echo $fila['idArticulo']; ?>" >
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
				<button onclick="agregarUsuario(2,<?php echo $fila['precio'];?> )"> Agregar Servicio</button>
			</td>		
		</tr>
	

<?php } while($fila=mysql_fetch_array($resultado)); ?>
</table>

</div>
<?php } ?>
	</div>
