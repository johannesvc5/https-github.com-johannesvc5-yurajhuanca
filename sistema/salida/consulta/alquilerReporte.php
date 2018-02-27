<?php
	include 'plantilla_venta.php';
	require '../../conexion.php';

	$fecha_a = $_POST['fecha_a'];
	$fecha_b = $_POST['fecha_b'];
	$tipoAnimal = $_POST['tipoAnimal'];
	
	$query = "SELECT animal.idAnimal, animal.arete, animal.tipo, salida.tipoSalida, salida.fInicio, salida.fFinal, salida.precio FROM salida INNER JOIN animal ON salida.idAnimal = animal.idAnimal WHERE tipoSalida = 'alquiler' AND fInicio >= '$fecha_a' AND fInicio <= '$fecha_b' AND tipo = '$tipoAnimal'";
	$resultado = $db->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'ALQUILER DE '.strtoupper($tipoAnimal).'',1,1,'C',1);
	$pdf->Cell(190,6,'Reporte de '.$fecha_a.' al '.$fecha_b.'',1,1,'C',1);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(15,6,'ID',1,0,'C',1);
	$pdf->Cell(25,6,'ARETE',1,0,'C',1);
	$pdf->Cell(30,6,'T. Animal',1,0,'C',1);
	$pdf->Cell(30,6,'TIPO',1,0,'C',1);
	$pdf->Cell(30,6,'F. INICIO',1,0,'C',1);
	$pdf->Cell(30,6,'F. FINAL',1,0,'C',1);
	$pdf->Cell(30,6,'PRECIO',1,1,'C',1);
	
	$pdf->SetFont('Arial','',8);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(15,6,utf8_decode($row['idAnimal']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['arete']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['tipo']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['tipoSalida']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['fInicio']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['fFinal']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['precio']),1,1,'C');
	}
	$pdf->Output();
?>