<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Coop. Yurajhuanca</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Amaranth" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/bootstrap.css">
        <link rel="stylesheet" href="../../../css/estilos.css">
        
        <script type="text/javascript" src="../../../js/jquery.js"></script>
        <script src="../../../js/main.js"></script>
        <script src="peticion.js"></script>

    </head>
    <body>
        <header style="background-color: #02416A">
            <nav class="nav navbar-static-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
                            <span class="sr-only">Desplegar / Ocultar Menu</span>
                            <span class="icon-bar">></span>
                            <span class="icon-bar">></span>
                            <span class="icon-bar">></span>
                        </button>
                        <a href="../principal.php" class="navbar-brand" style="color: rgba(255, 255, 255, 1)">Coop. Yurajhuanca</a>
                    </div>
                    <!--INICIA MENU -->
                    <div class="collapse navbar-collapse navbar-right" id="navegacion-fm" style="margin-top: 5px">
                        <?php echo '
                            <div class="input-group container-fluid">
                                <p style="margin-left: -30px; color: #fff; font-family: Arial; margin-top: 10px; font-size: 15px">¡Hola!</p>    
                            </div>
                        '; ?>   
                    </div>
                </div>
            </nav>
        </header>
        <nav class="nav nav-stacked col-lg-3 col-md-3 col-sm-3 col-sm-12" style="color: rgba(255, 255, 255, 1); width: all; background-color: #02416A; padding: 0">
            <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a href="../../principal.php" style="color: #ffffff"><span class="glyphicon glyphicon-home"></span> Principal</a></li>

            <li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a href="consulta.php" style="color: #ffffff" ><span class="glyphicon glyphicon-chevron-left"></span> Volver</a></li>

            <?php
            echo '<li role="presentation" style="background-color: #02416A;color: rgba(255, 255, 255, 1)"><a href="logout.php" style="color: #ffffff"><span class="glyphicon glyphicon-off"></span> Salir</a></li>'
            ?>
        </nav>

		<div class="container col-lg-9 col-md-9 col-sm-9 col-sm-12">
	        <div class="row" name="principal" style="margin-top: 10px">
	            
	            <?php

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

					$tabla="";
					$tablab="";

					echo '	<form class="form-inline text-center" action="generalReporte.php" method="post">
			                  <div class="form-group">
			                    <label for="busqueda">Generar Reporte</label>
			                    <input type="date" class="form-control" id="fecha_a" name="fecha_a" value="'.$fecha_a.'">
			                    <input type="date" class="form-control" id="fecha_b" name="fecha_b" value="'.$fecha_b.'">
			                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"></span> Generar PDF</button>
			                  </div>
			                </form>';

					//print($fecha_a . $fecha_b);
					//exit();

					require('../../conexion.php');

					$seleccion = "
					SELECT
					animal.idAnimal,
					pastor.idPastor,
					pastor.nombre,
					salida.tipoSalida,
					animal.tipo,
					animal.arete
					FROM
					animal
					LEFT OUTER JOIN pastor ON animal.idPastor = pastor.idPastor
					LEFT OUTER JOIN salida ON salida.idAnimal = animal.idAnimal
					WHERE tipoSalida IS NULL ";

					$buscarCliente=$db->query($seleccion);
					if ($buscarCliente->num_rows > 0)
					{
					    while($filaCliente= $buscarCliente->fetch_assoc())
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
					} 
					else
					    {
					        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
					    }
					echo '<h4 class="text-center text-primary" style="margin-top:20px;">Cantidad de Animales al Cuidado de los Pastores</h4>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-primary">
							  <div class="panel-heading">'.strtoupper($nombre1).'</div>
							  <div class="panel-body">
							  	<p><strong>Borregos: </strong>'.$totalBorrego1.'</p>
							  	<p><strong>Alpacas: </strong>'.$totalAlpaca1.'</p>
							  	<p><strong>Vacunos: </strong>'.$totalVacuno1.'</p>
							  	<p><strong>Total: </strong>'.$total1.'</p>
							  </div>
							</div>
							</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-primary">
							  <div class="panel-heading">'.strtoupper($nombre2).'</div>
							  <div class="panel-body">
							  	<p><strong>Borregos: </strong>'.$totalBorrego2.'</p>
							  	<p><strong>Alpacas: </strong>'.$totalAlpaca2.'</p>
							  	<p><strong>Vacunos: </strong>'.$totalVacuno2.'</p>
							  	<p><strong>Total: </strong>'.$total2.'</p>
							  </div>
							</div>
							</div>';
					/*echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-primary">
							  <div class="panel-heading">'.strtoupper($nombre3).'</div>
							  <div class="panel-body">
							  	<p><strong>Borregos: </strong>'.$totalBorrego3.'</p>
							  	<p><strong>Alpacas: </strong>'.$totalAlpaca3.'</p>
							  	<p><strong>Vacunos: </strong>'.$totalVacuno3.'</p>
							  	<p><strong>Total: </strong>'.$total3.'</p>
							  </div>
							</div>
							</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-primary">
							  <div class="panel-heading">'.strtoupper($nombre4).'</div>
							  <div class="panel-body">
							  	<p><strong>Borregos: </strong>'.$totalBorrego4.'</p>
							  	<p><strong>Alpacas: </strong>'.$totalAlpaca4.'</p>
							  	<p><strong>Vacunos: </strong>'.$totalVacuno4.'</p>
							  	<p><strong>Total: </strong>'.$total4.'</p>
							  </div>
							</div>
							</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-primary">
							  <div class="panel-heading">'.strtoupper($nombre5).'</div>
							  <div class="panel-body">
							  	<p><strong>Borregos: </strong>'.$totalBorrego5.'</p>
							  	<p><strong>Alpacas: </strong>'.$totalAlpaca5.'</p>
							  	<p><strong>Vacunos: </strong>'.$totalVacuno5.'</p>
							  	<p><strong>Total: </strong>'.$total5.'</p>
							  </div>
							</div>
							</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-primary">
							  <div class="panel-heading">'.strtoupper($nombre6).'</div>
							  <div class="panel-body">
							  	<p><strong>Borregos: </strong>'.$totalBorrego6.'</p>
							  	<p><strong>Alpacas: </strong>'.$totalAlpaca6.'</p>
							  	<p><strong>Vacunos: </strong>'.$totalVacuno6.'</p>
							  	<p><strong>Total: </strong>'.$total6.'</p>
							  </div>
							</div>
							</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-primary">
							  <div class="panel-heading">'.strtoupper($nombre7).'</div>
							  <div class="panel-body">
							  	<p><strong>Borregos: </strong>'.$totalBorrego7.'</p>
							  	<p><strong>Alpacas: </strong>'.$totalAlpaca7.'</p>
							  	<p><strong>Vacunos: </strong>'.$totalVacuno7.'</p>
							  	<p><strong>Total: </strong>'.$total7.'</p>
							  </div>
							</div>
							</div>';
							*/
					$generalB = $totalBorrego1 + $totalBorrego2 + $totalBorrego3 + $totalBorrego4 + $totalBorrego5 + $totalBorrego6 + $totalBorrego7;
					$generalA = $totalAlpaca1 + $totalAlpaca2 + $totalAlpaca3 + $totalAlpaca4 + $totalAlpaca5 + $totalAlpaca6 + $totalAlpaca7;
					$generalV = $totalVacuno1 + $totalVacuno2 + $totalVacuno3 + $totalVacuno4 + $totalVacuno5 + $totalVacuno6 + $totalVacuno7;
					$general = $generalB + $generalA + $generalV;
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-success">
							  <div class="panel-heading">TOTAL</div>
							  <div class="panel-body">
							  	<p><strong>Borregos: </strong>'.$generalB.'</p>
							  	<p><strong>Alpacas: </strong>'.$generalA.'</p>
							  	<p><strong>Vacunos: </strong>'.$generalV.'</p>
							  	<p><strong>Total: </strong>'.$general.'</p>
							  </div>
							</div>
							</div>';

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
					        	} 	
					        }
						}
					echo '<h4 class="text-center text-primary col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">Cantidad de Empadres</h4>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-primary">
							  <div class="panel-heading">Empadres</div>
							  <div class="panel-body">
							  	<p><strong>Total: </strong>'.$cantEmpadre.'</p>
							  </div>
							</div>
							</div>';

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
					        	} 	
					        }
						}
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-primary">
							  <div class="panel-heading">Servicios</div>
							  <div class="panel-body">
							  	<p><strong>Total: </strong>'.$cantServicio.'</p>
							  </div>
							</div>
							</div>';

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

					$respuestaCria=$db->query($buscarCria);
					if ($respuestaCria->num_rows > 0){
						$tabla.= 
					    '<table class="table table-striped col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px; max-width:90%; margin-left:5%">
					        <tr>
					            <th>Tipo</th>
					            <th>Fecha de Nacimiento</th>
					            <th>Arete</th>
					            <th>Sexo</th>
					        </tr>';
						while($buscarGC= $respuestaCria->fetch_assoc())
					        {
					        	$tabla.=
							    '<tr>
							        <td>'.$buscarGC['tipo'].'</td>
							        <td>'.$buscarGC['fNacimiento'].'</td>
							        <td>'.$buscarGC['areteCria'].'</td>
							        <td>'.$buscarGC['sexo'].'</td>
							    </tr>
							    ';
					        	if ($buscarGC['fNacimiento'] >= $fecha_a AND $buscarGC['fNacimiento'] <= $fecha_b) {
					        		if ($buscarGC['tipo']=='borrego') {
					        			$cantCriaB = $cantCriaB +1;
					        		}elseif ($buscarGC['tipo']=='alpaca') {
					        			$cantCriaA = $cantCriaA +1;
					        		}elseif ($buscarGC['tipo']=='vacuno') {
					        			$cantCriaV = $cantCriaV +1;
					        		}
					        	} 	
					        }
					    	$tabla.='</table>';
						}
					echo '<h4 class="text-center text-primary col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:20px;">Cantidad de Crias</h4>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-danger">
							  <div class="panel-heading">Crias Borregos</div>
							  <div class="panel-body">
							  	<p><strong>Total: </strong>'.$cantCriaB.'</p>
							  </div>
							</div>
							</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-danger">
							  <div class="panel-heading">Crias Alpacas</div>
							  <div class="panel-body">
							  	<p><strong>Total: </strong>'.$cantCriaA.'</p>
							  </div>
							</div>
							</div>';
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-danger">
							  <div class="panel-heading">Crias Vacunos</div>
							  <div class="panel-body">
							  	<p><strong>Total: </strong>'.$cantCriaV.'</p>
							  </div>
							</div>
							</div>';
					$criaTotal = $cantCriaA + $cantCriaB + $cantCriaV;
					echo '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" style="margin-top:10px">
							<div class="panel panel-danger">
							  <div class="panel-heading">Total de Crias</div>
							  <div class="panel-body">
							  	<p><strong>Total: </strong>'.$criaTotal.'</p>
							  </div>
							</div>
							</div>';
					echo $tabla;						
	            ?>
	        </div>
	    </div>

        <script type="text/javascript" src="../../../js/jquery.js"></script>
        <script src="../../../js/main.js"></script>
        <script src="../../../js/bootstrap.js"></script>
        <script src="mainSistema.js"></script>
    </body>
</html>