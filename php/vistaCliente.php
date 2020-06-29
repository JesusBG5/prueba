<?php 
	require_once("cliente.php");
	$obj = new Cliente();
 ?>
<section id="principal">

	<form action="" method="post">
		Nombre: <input type="text" name="nombre"> <br>
		Apellido Paterno: <input type="text" name="app"> <br>
		Apellido Materno: <input type="text" name="apm"> <br>
		Edad: <input type="text" name="edad"> <br>
		Sexo: <select name="sexo" id="">
			<option value="1">Masculino</option>
			<option value="2">Femenino</option>
		</select> <br>
		Teléfono: <input type="text" name="telefono"> <br>
		Correo: <input type="text" name="correo"> <br>
		Fecha Nacimiento <input type="date" name="fecha"> <br>
		<input type="submit" value="Agregar Cliente" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>Cliente eliminado</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>Cliente agregado</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$nombre = $_POST["nombre"];
			$direccion = $_POST["direccion"];
			$telefono = $_POST["telefono"];
			$correo = $_POST["correo"];
			$app = $_POST["app"];
			$apm = $_POST["apm"];
			$sexo = $_POST["sexo"];
			$fecha = $_POST["fecha"];
			$obj->alta($nombre,$direccion,$telefono,$correo,$apm,$app,$sexo,$fecha);
			header("Location: ?sec=cli&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Correo</th>
			<th>Sexo</th>
			<th>Fecha Nacimiento</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]." ".$fila["apematerno"]." ".$fila["apepaterno"]."</td>";
				echo "<td>".$fila["direccion"]."</td>";
				echo "<td>".$fila["telefono"]."</td>";
				echo "<td>".$fila["correo"]."</td>";
				echo "<td>".$fila["sexo"]."</td>";
				echo "<td>".$fila["fenacimiento"]."</td>";
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDVenta']; ?>" name="id">
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
			header("Location: ?sec=ven&e=1");
		}

	 ?>
</section>