<?php
	include 'plantilla_general.php';
	require '../../conexion.php';

	$fecha_a = $_POST['fecha_a'];
	$fecha_b = $_POST['fecha_b'];

	$pastor1 = 1;
	$pastor2 = 2;
	$pastor3 = 3;
	$pastor4 = 4;
	$pastor5 = 5;
	$pastor6 = 6;
	$pastor7 = 7;

	$nombre1 = "";
	$nombre2 = "";
	$nombre3 = "";
	$nombre4 = "";
	$nombre5 = "";
	$nombre6 = "";
	$nombre7 = "";

	$total1 = 0;
	$total2 = 0;
	$total3 = 0;
	$total4 = 0;
	$total5 = 0;
	$total6 = 0;
	$total7 = 0;

	$totalBorrego1 = 0;
	$totalBorrego2 = 0;
	$totalBorrego3 = 0;
	$totalBorrego4 = 0;
	$totalBorrego5 = 0;
	$totalBorrego6 = 0;
	$totalBorrego7 = 0;

	$totalAlpaca1 = 0;
	$totalAlpaca2 = 0;
	$totalAlpaca3 = 0;
	$totalAlpaca4 = 0;
	$totalAlpaca5 = 0;
	$totalAlpaca6 = 0;
	$totalAlpaca7 = 0;

	$totalVacuno1 = 0;
	$totalVacuno2 = 0;
	$totalVacuno3 = 0;
	$totalVacuno4 = 0;
	$totalVacuno5 = 0;
	$totalVacuno6 = 0;
	$totalVacuno7 = 0;
	
	$query = "SELECT animal.idAnimal, pastor.idPastor, pastor.nombre, salida.tipoSalida, animal.tipo, animal.arete
			FROM animal
			LEFT OUTER JOIN pastor ON animal.idPastor = pastor.idPastor
			LEFT OUTER JOIN salida ON salida.idAnimal = animal.idAnimal
			WHERE tipoSalida IS NULL";

	$resultado = $db->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(0, 178, 236);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'Reporte de Total de Animal por Pastor',1,1,'C',1);
	$pdf->Cell(190,6,'Reporte de '.$fecha_a.' al '.$fecha_b.'',1,1,'C',1);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(70,6,'PASTOR',1,0,'C',1);
	$pdf->Cell(30,6,'BORREGOS',1,0,'C',1);
	$pdf->Cell(30,6,'ALPACAS',1,0,'C',1);
	$pdf->Cell(30,6,'VACUNOS',1,0,'C',1);
	$pdf->Cell(30,6,'TOTAL',1,1,'C',1);
	
	$pdf->SetFont('Arial','',8);
	
	while($filaCliente = $resultado->fetch_assoc())
	{
		if ($filaCliente['idPastor'] == $pastor1) {
			$total1 = $total1 + 1;
			$nombre1 = $filaCliente['nombre'];
			if ($filaCliente['tipo']=='borrego') {
					$totalBorrego1 = $totalBorrego1+1;
				}elseif ($filaCliente['tipo']=='alpaca') {
					$totalAlpaca1 = $totalAlpaca1+1;
				}elseif ($filaCliente['tipo']=='vacuno') {
					$totalVacuno1 = $totalVacuno1+1;
				}							    		
		}elseif ($filaCliente['idPastor'] == $pastor2) {
			$total2 = $total2 + 1;
			$nombre2 = $filaCliente['nombre'];
			if ($filaCliente['tipo']=='borrego') {
					$totalBorrego2 = $totalBorrego2+1;
				}elseif ($filaCliente['tipo']=='alpaca') {
					$totalAlpaca2 = $totalAlpaca2+1;
				}elseif ($filaCliente['tipo']=='vacuno') {
					$totalVacuno2 = $totalVacuno2+1;
				}	
		}elseif ($filaCliente['idPastor'] == $pastor3) {
			$total3 = $total3 + 1;
			$nombre3 = $filaCliente['nombre'];
			if ($filaCliente['tipo']=='borrego') {
					$totalBorrego3 = $totalBorrego3+1;
				}elseif ($filaCliente['tipo']=='alpaca') {
					$totalAlpaca3 = $totalAlpaca3+1;
				}elseif ($filaCliente['tipo']=='vacuno') {
					$totalVacuno3 = $totalVacuno3+1;
				}	
		}elseif ($filaCliente['idPastor'] == $pastor4) {
			$total4 = $total4 + 1;
			$nombre4 = $filaCliente['nombre'];
			if ($filaCliente['tipo']=='borrego') {
					$totalBorrego4 = $totalBorrego4+1;
				}elseif ($filaCliente['tipo']=='alpaca') {
					$totalAlpaca4 = $totalAlpaca4+1;
				}elseif ($filaCliente['tipo']=='vacuno') {
					$totalVacuno4 = $totalVacuno4+1;
				}	
		}elseif ($filaCliente['idPastor'] == $pastor5) {
			$total5 = $total5 + 1;
			$nombre5 = $filaCliente['nombre'];
			if ($filaCliente['tipo']=='borrego') {
					$totalBorrego5 = $totalBorrego5+1;
				}elseif ($filaCliente['tipo']=='alpaca') {
					$totalAlpaca5 = $totalAlpaca5+1;
				}elseif ($filaCliente['tipo']=='vacuno') {
					$totalVacuno5 = $totalVacuno5+1;
				}	
		}elseif ($filaCliente['idPastor'] == $pastor5) {
			$total5 = $total5 + 1;
			$nombre5 = $filaCliente['nombre'];
			if ($filaCliente['tipo']=='borrego') {
					$totalBorrego5 = $totalBorrego5+1;
				}elseif ($filaCliente['tipo']=='alpaca') {
					$totalAlpaca5 = $totalAlpaca5+1;
				}elseif ($filaCliente['tipo']=='vacuno') {
					$totalVacuno5 = $totalVacuno5+1;
				}	
		}elseif ($filaCliente['idPastor'] == $pastor6) {
			$total6 = $total6 + 1;
			$nombre6 = $filaCliente['nombre'];
			if ($filaCliente['tipo']=='borrego') {
					$totalBorrego6 = $totalBorrego6+1;
				}elseif ($filaCliente['tipo']=='alpaca') {
					$totalAlpaca6 = $totalAlpaca6+1;
				}elseif ($filaCliente['tipo']=='vacuno') {
					$totalVacuno6 = $totalVacuno6+1;
				}	
		}elseif ($filaCliente['idPastor'] == $pastor7) {
			$total7 = $total7 + 1;
			$nombre7 = $filaCliente['nombre'];
			if ($filaCliente['tipo']=='borrego') {
					$totalBorrego7 = $totalBorrego7+1;
				}elseif ($filaCliente['tipo']=='alpaca') {
					$totalAlpaca7 = $totalAlpaca7+1;
				}elseif ($filaCliente['tipo']=='vacuno') {
					$totalVacuno7 = $totalVacuno7+1;
				}	
		}
	}

	$pdf->Cell(70,6,utf8_decode($nombre1),1,0,'D');
	$pdf->Cell(30,6,utf8_decode($totalBorrego1),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($totalAlpaca1),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($totalVacuno1),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($total1 = $totalBorrego1+$totalAlpaca1+$totalVacuno1),1,1,'C');

	$pdf->Cell(70,6,utf8_decode($nombre2),1,0,'D');
	$pdf->Cell(30,6,utf8_decode($totalBorrego2),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($totalAlpaca2),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($totalVacuno2),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($total2 = $totalBorrego2+$totalAlpaca2+$totalVacuno2),1,1,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'',1,1,'C',1);

	$pdf->SetFillColor(0, 178, 236);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'Reporte de Total de Animales',1,1,'C',3);
	$pdf->Cell(190,6,'Reporte de '.$fecha_a.' al '.$fecha_b.'',1,1,'C',3);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(50,6,'BORREGOS',1,0,'C',1);
	$pdf->Cell(50,6,'ALPACAS',1,0,'C',1);
	$pdf->Cell(50,6,'VACUNOS',1,0,'C',1);
	$pdf->Cell(40,6,'TOTAL',1,1,'C',1);

	$pdf->Cell(50,6,utf8_decode($generalB = $totalBorrego1 + $totalBorrego2 + $totalBorrego3 + $totalBorrego4 + $totalBorrego5 + $totalBorrego6 + $totalBorrego7),1,0,'C');
	$pdf->Cell(50,6,utf8_decode($generalA = $totalAlpaca1 + $totalAlpaca2 + $totalAlpaca3 + $totalAlpaca4 + $totalAlpaca5 + $totalAlpaca6 + $totalAlpaca7),1,0,'C');
	$pdf->Cell(50,6,utf8_decode($generalV = $totalVacuno1 + $totalVacuno2 + $totalVacuno3 + $totalVacuno4 + $totalVacuno5 + $totalVacuno6 + $totalVacuno7),1,0,'C');
	$pdf->Cell(40,6,utf8_decode($general = $generalB + $generalA + $generalV),1,1,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'',1,1,'C',1);

	$pdf->SetFillColor(0, 178, 236);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'Reporte de Empadres',1,1,'C',3);
	$pdf->Cell(190,6,'Reporte de '.$fecha_a.' al '.$fecha_b.'',1,1,'C',3);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(20,6,'ID',1,0,'C',1);
	$pdf->Cell(20,6,'FECHA',1,0,'C',1);
	$pdf->Cell(150,6,'OBSERVACIONES',1,1,'C',1);

	$buscar = "
		SELECT
		empadrado.idEmpadrado,
		empadrado.fechaEmp,
		empadrado.observaciones
		FROM
		empadrado
		";
		$cantEmpadre = 0;
					$respuesta=$db->query($buscar);
		if ($respuesta->num_rows > 0){
			while($buscarRespuesta= $respuesta->fetch_assoc())
			{
				if ($buscarRespuesta['fechaEmp'] >= $fecha_a AND $buscarRespuesta['fechaEmp'] <= $fecha_b) {
					$cantEmpadre = $cantEmpadre + 1;
					$pdf->Cell(20,6,utf8_decode($buscarRespuesta['idEmpadrado']),1,0,'C');
					$pdf->Cell(20,6,utf8_decode($buscarRespuesta['fechaEmp']),1,0,'C');
					$pdf->Cell(150,6,utf8_decode($buscarRespuesta['observaciones']),1,1,'C');
				} 	
			}
		}
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'',1,1,'C',1);

	$pdf->SetFillColor(0, 178, 236);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'Reporte de Servicios',1,1,'C',3);
	$pdf->Cell(190,6,'Reporte de '.$fecha_a.' al '.$fecha_b.'',1,1,'C',3);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(10,6,'ID',1,0,'C',1);
	$pdf->Cell(20,6,'Fecha',1,0,'C',1);
	$pdf->Cell(30,6,'Tiempo de Copula',1,0,'C',1);
	$pdf->Cell(110,6,'Observaciones',1,0,'C',1);
	$pdf->Cell(20,6,'Empadrado',1,1,'C',1);

	$buscarServicio = "
		SELECT
		servicio.idServicio,
		servicio.fecha,
		servicio.tiempoCopula,
		servicio.observaciones,
		servicio.idEmpadrado
		FROM
		servicio
		";
		$cantServicio = 0;
		$respuestaServicio=$db->query($buscarServicio);
		if ($respuesta->num_rows > 0){
			while($buscarRS= $respuestaServicio->fetch_assoc())
				{
					if ($buscarRS['fecha'] >= $fecha_a AND $buscarRS['fecha'] <= $fecha_b) {
					    $cantServicio = $cantServicio + 1;
					    $pdf->Cell(10,6,utf8_decode($buscarRS['idServicio']),1,0,'C');
						$pdf->Cell(20,6,utf8_decode($buscarRS['fecha']),1,0,'C');
						$pdf->Cell(30,6,utf8_decode($buscarRS['tiempoCopula']),1,0,'C');
						$pdf->Cell(110,6,utf8_decode($buscarRS['observaciones']),1,0,'C');
						$pdf->Cell(20,6,utf8_decode($buscarRS['idEmpadrado']),1,1,'C');
					} 	
				}
			}
		$pdf->SetFillColor(232,232,232);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(190,6,'',1,1,'C',1);

		$pdf->SetFillColor(0, 178, 236);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(190,6,'Reporte de Crias',1,1,'C',3);
		$pdf->Cell(190,6,'Reporte de '.$fecha_a.' al '.$fecha_b.'',1,1,'C',3);
		
		$pdf->SetFillColor(232,232,232);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(30,6,'Tipo',1,0,'C',1);
		$pdf->Cell(30,6,'Fecha Nacimiento',1,0,'C',1);
		$pdf->Cell(30,6,'Arete de Cria',1,0,'C',1);
		$pdf->Cell(100,6,'Sexo',1,1,'C',1);

		$buscarCria = "
		SELECT
		animal.tipo,
		gestacion.fNacimiento,
		gestacion.areteCria,
		gestacion.sexo
		FROM
		animal
		INNER JOIN padre ON padre.idAnimal = animal.idAnimal
		INNER JOIN empadrado ON padre.idEmpadrado = empadrado.idEmpadrado
		INNER JOIN gestacion ON gestacion.idEmpadrado = empadrado.idEmpadrado
		GROUP BY areteCria
		";

		$cantCriaA = 0;
		$cantCriaV = 0;
		$cantCriaB = 0;

		$criaBM=0;
		$criaBH=0;
		$criaAH=0;
		$criaAM=0;
		$criaVM=0;
		$criaVH=0;

		$respuestaCria=$db->query($buscarCria);
		if ($respuestaCria->num_rows > 0){
			while($buscarGC= $respuestaCria->fetch_assoc())
				{
					'<tr>
						<td>'.$buscarGC['tipo'].'</td>
						<td>'.$buscarGC['fNacimiento'].'</td>
						<td>'.$buscarGC['areteCria'].'</td>
						<td>'.$buscarGC['sexo'].'</td>
					</tr>';
					if ($buscarGC['fNacimiento'] >= $fecha_a AND $buscarGC['fNacimiento'] <= $fecha_b) {
						if ($buscarGC['tipo']=='borrego') {
						 	$cantCriaB = $cantCriaB +1;
						 	if ($buscarGC['sexo']=='macho') {
						 		$criaBM=$criaBM+1;
						 	}elseif ($buscarGC['sexo']=='hembra') {
						 		$criaBH=$criaBH+1;
						 	}
						}elseif ($buscarGC['tipo']=='alpaca') {
						 	$cantCriaA = $cantCriaA +1;
						 	if ($buscarGC['sexo']=='macho') {
						 		$criaAM=$criaAM+1;
						 	}elseif ($buscarGC['sexo']=='hembra') {
						 		$criaAH=$criaAH+1;
						 	}
						}elseif ($buscarGC['tipo']=='vacuno') {
						 	$cantCriaV = $cantCriaV +1;
						 	if ($buscarGC['sexo']=='macho') {
						 		$criaVM=$criaVM+1;
						 	}elseif ($buscarGC['sexo']=='hembra') {
						 		$criaVH=$criaVH+1;
						 	}
						}
						$pdf->Cell(30,6,utf8_decode($buscarGC['tipo']),1,0,'C');
						$pdf->Cell(30,6,utf8_decode($buscarGC['fNacimiento']),1,0,'C');
						$pdf->Cell(30,6,utf8_decode($buscarGC['areteCria']),1,0,'C');
						$pdf->Cell(100,6,utf8_decode($buscarGC['sexo']),1,1,'C');
					} 	
			}
		}

		$pdf->SetFillColor(232,232,232);
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(190,6,'',1,1,'C',1);

	$pdf->SetFillColor(0, 178, 236);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'Reporte de Total de Empadrado',1,1,'C',3);
	$pdf->Cell(190,6,'Reporte de '.$fecha_a.' al '.$fecha_b.'',1,1,'C',3);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(60,6,'Total de Empadres',1,0,'C',1);
	$pdf->Cell(60,6,'Total de Servicios',1,0,'C',1);
	$pdf->Cell(70,6,'Total de Crias',1,1,'C',1);

	$pdf->Cell(60,6,utf8_decode($cantEmpadre),1,0,'C');
	$pdf->Cell(60,6,utf8_decode($cantServicio),1,0,'C');
	$pdf->Cell(70,6,utf8_decode($cria = $cantCriaV +$cantCriaA+$cantCriaB),1,1,'C');

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'',1,1,'C',1);

	$pdf->SetFillColor(0, 178, 236);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(190,6,'Reporte de Total de Crias',1,1,'C',3);
	$pdf->Cell(190,6,'Reporte de '.$fecha_a.' al '.$fecha_b.'',1,1,'C',3);
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(60,6,'Crias Borregos',1,0,'C',1);
	$pdf->Cell(60,6,'Crias Alpacas',1,0,'C',1);
	$pdf->Cell(70,6,'Crias Vacunos',1,1,'C',1);

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(30,6,'Machos',1,0,'C',1);
	$pdf->Cell(30,6,'Hembras',1,0,'C',1);
	$pdf->Cell(30,6,'Machos',1,0,'C',1);
	$pdf->Cell(30,6,'Hembras',1,0,'C',1);
	$pdf->Cell(35,6,'Machos',1,0,'C',1);
	$pdf->Cell(35,6,'Hembras',1,1,'C',1);

	$pdf->Cell(30,6,utf8_decode($criaBM),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($criaBH),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($criaAM),1,0,'C');
	$pdf->Cell(30,6,utf8_decode($criaAH),1,0,'C');
	$pdf->Cell(35,6,utf8_decode($criaVM),1,0,'C');
	$pdf->Cell(35,6,utf8_decode($criaVH),1,1,'C');

	$pdf->Output();
?>