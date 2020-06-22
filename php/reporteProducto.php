<?php 
	require_once("../fpdf/fpdf.php");
	require_once("producto.php");
	$pdf = new FPDF();
	$obj = new Producto();
	$res = $obj->consulta();
	$pdf->AddPage();
	$pdf->Image("../img/iconoreporte.png",5,5,15,15);
	$pdf->SetFont('Arial','B',20);
	$pdf->Cell(200,20,"Reporte de Productos",0,0,"C");
	$pdf->Ln(30);
	$pdf->SetFont('Arial','B',9);
	$ancho = 25;
	$pdf->Cell($ancho,10,utf8_decode("Nombre"),1,0,"C");
	$pdf->Cell($ancho,10,utf8_decode("Descripción"),1,0,"C");
	$pdf->Cell($ancho,10,utf8_decode("Precio Venta"),1,0,"C");
	$pdf->Cell($ancho,10,utf8_decode("Precio Compra"),1,0,"C");
	$pdf->Cell($ancho-6,10,utf8_decode("Cantidad"),1,0,"C");
	$pdf->Cell($ancho,10,utf8_decode("Stock Mínimo"),1,0,"C");
	$pdf->Cell($ancho,10,utf8_decode("Stock Máximo"),1,0,"C");
	$pdf->Cell($ancho,10,utf8_decode("Categoría"),1,0,"C");
	$pdf->Ln(10);
	$pdf->SetFont('Arial','',9);
	while($fila = $res->fetch_assoc()){
		$pdf->Cell($ancho,10,utf8_decode($fila["nombre"]),1,0,"C");
		$pdf->Cell($ancho,10,utf8_decode($fila["descripcion"]),1,0,"C");
		$pdf->Cell($ancho,10,utf8_decode($fila["preciov"]),1,0,"C");
		$pdf->Cell($ancho,10,utf8_decode($fila["precioc"]),1,0,"C");
		$pdf->Cell($ancho-6,10,utf8_decode($fila["cantidad"]),1,0,"C");
		$pdf->Cell($ancho,10,utf8_decode($fila["cantmin"]),1,0,"C");
		$pdf->Cell($ancho,10,utf8_decode($fila["cantmax"]),1,0,"C");
		$pdf->Cell($ancho,10,utf8_decode($fila["categoria"]),1,0,"C");
		$pdf->Ln(10);
	}
	$pdf->Output();
 ?>