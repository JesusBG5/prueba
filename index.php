<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>ERP</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<nav>
		<ul>
			<a href="index.php"><li>Inicio</li></a>
			<a href="?sec=usu"><li>Usuario</li></a>
			<a href="?sec=ven"><li>Ventas</li></a>
			<a href="?sec=emp"><li>Empleados</li></a>
			<a href="?sec=cli"><li>Cliente</li></a>
			<a href="?sec=pro"><li>Producto</li></a>
			<a href="?sec=pro"><li>Producto</li></a>
			<a href="?sec=pro"><li>Producto</li></a>
			<a href="?sec=pro"><li>Producto</li></a>
			<a href="?sec=pro"><li>Producto</li></a>
			<a href="?sec=pro"><li>Producto</li></a>
			<a href="?sec=pro"><li>Producto</li></a>
			<a href="?sec=pro"><li>Producto</li></a>
		</ul>
	</nav>
	<?php 

		if(isset($_GET["sec"])){
			$sec = $_GET["sec"];
			switch ($sec) {
				case 'usu':
					require_once("php/vistaUsuario.php");
					break;
				case 'pro':
					require_once("php/vistaProducto.php");
					break;
				case 'ven':
					require_once("php/vistaVenta.php");
					break;
				case 'gpro':
					require_once("php/graficaProducto.php");
					break;
				case 'cli':
					require_once("php/vistaCliente.php");
					break;
				case 'rpro':
					header("Location: php/reporteProducto.php");
					break;
			}
		}
	 ?>
</body>
</html>