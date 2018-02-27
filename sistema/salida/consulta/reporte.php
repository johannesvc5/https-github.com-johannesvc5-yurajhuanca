<?php
	include 'plantilla.php';
	require '../../conexion.php';
	
	$query = "SELECT * FROM animal LEFT OUTER JOIN salida ON salida.idAnimal = animal.idAnimal WHERE salida.idSalida IS NULL AND animal.tipo ='borrego'";
	$resultado = $db->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(12,6,'TIPO',1,0,'C',1);
	$pdf->Cell(12,6,'ARETE',1,0,'C',1);
	$pdf->Cell(12,6,'R.G',1,0,'C',1);
	$pdf->Cell(12,6,'EDAD',1,0,'C',1);
	$pdf->Cell(12,6,'SEXO',1,0,'C',1);
	$pdf->Cell(25,6,'COND. CORP.',1,0,'C',1);
	$pdf->Cell(15,6,'TATUAJE.',1,0,'C',1);
	$pdf->Cell(15,6,'T. IZQ.',1,0,'C',1);
	$pdf->Cell(15,6,'T. DER.',1,0,'C',1);
	$pdf->Cell(25,6,'OBSERV.',1,0,'C',1);
	$pdf->Cell(25,6,'ID PASTOR',1,1,'C',1);
	
	$pdf->SetFont('Arial','',8);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(12,6,utf8_decode($row['tipo']),1,0,'C');
		$pdf->Cell(12,6,utf8_decode($row['arete']),1,0,'C');
		$pdf->Cell(12,6,utf8_decode($row['registro']),1,0,'C');
		$pdf->Cell(12,6,utf8_decode($row['edad']),1,0,'C');
		$pdf->Cell(12,6,utf8_decode($row['sexo']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['condCorp']),1,0,'C');
		$pdf->Cell(15,6,utf8_decode($row['tatuaje']),1,0,'C');
		$pdf->Cell(15,6,utf8_decode($row['tatIzq']),1,0,'C');
		$pdf->Cell(15,6,utf8_decode($row['tatDer']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['observaciones']),1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['idPastor']),1,1,'C');
	}
	$pdf->Output();
?>