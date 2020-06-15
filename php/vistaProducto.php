<?php 
	require_once("producto.php");
	$obj = new Producto();
 ?>
<section id="principal">
	<div>
		<a href="?sec=gpro"><input type="button" value="Generar Gráfica"></a>
	</div>
	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		Password: <input type="password" name="password"> <br>
		Tipo:
		<select name="tipo">
			<option value="1">Administrador</option>
			<option value="2">Usuario</option>
		</select> <br>
		<input type="submit" value="Agregar Usuario" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>Usuario eliminado</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>Usuario agregado</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$nombre = $_POST["nombre"];
			$password = $_POST["password"];
			$tipo = $_POST["tipo"];
			
			$obj->alta($nombre,$tipo,$password);
			header("Location: ?sec=usu&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Cantidad</th>
			<th>Precio Compra</th>
			<th>Precio Venta</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["descripcion"]."</td>";
				echo "<td>".$fila["cantidad"]."</td>";
				echo "<td>".$fila["precioc"]."</td>";
				echo "<td>".$fila["preciov"]."</td>";
				
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDusuario']; ?>" name="id">
					<input type="submit" value="Eliminar" name="eliminar">
				</form>
				</td>
				<?php
				echo "</tr>";
			}
		 ?>
	</table>
	<?php 
		if(isset($_POST["eliminar"])){
			$id = $_POST["id"];
			$obj->eliminar($id);
			header("Location: ?sec=usu&e=1");
		}

	 ?>
</section>