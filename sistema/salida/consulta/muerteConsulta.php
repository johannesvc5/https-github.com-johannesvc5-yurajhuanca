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
	        <div class="row" name="principal">
	            <h4 class="text-center" style="color: #078F64; padding-bottom: 10px">Ventas</h4>
	            
	            <?php

	                $fecha_a = $_POST['fecha_a'];
					$fecha_b = $_POST['fecha_b'];
					$tipoAnimal = $_POST['tipoAnimal'];

					$tabla="";

					echo '	<form class="form-inline text-center" action="muerteReporte.php" method="post">
			                  <div class="form-group">
			                    <label for="busqueda">Generar Reporte</label>
			                    <input type="date" class="form-control" id="fecha_a" name="fecha_a" value="'.$fecha_a.'">
			                    <input type="date" class="form-control" id="fecha_b" name="fecha_b" value="'.$fecha_b.'">
			                    <input type="text" class="form-control" id="tipoAnimal" name="tipoAnimal" value="'.$tipoAnimal.'">
			                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-log-in"></span> Generar PDF</button>
			                  </div>
			                </form>';

					//print($fecha_a . $fecha_b);
					//exit();

					require('../../conexion.php');

					$seleccion = "SELECT 
								animal.idAnimal, animal.arete, animal.tipo, salida.tipoSalida, salida.fInicio, salida.fFinal, salida.precio 
								FROM salida INNER JOIN animal ON salida.idAnimal = animal.idAnimal 
								WHERE tipoSalida = 'muerte'";

					$buscarCliente=$db->query($seleccion);
					if ($buscarCliente->num_rows > 0)
					{
					    $tabla.= 
					    '<table class="table table-striped col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px; max-width:90%; margin-left:5%">
					        <tr>
					            <th>ID</th>
					            <th>Arete</th>
					            <th>Tipo Animal</th>
					            <th>Tipo</th>
					            <th>F. INICIO</th>
					            <th>F. FINAL</th>
					            <th>PRECIO</th>
					        </tr>';
					    while($filaCliente= $buscarCliente->fetch_assoc())
					        {
					        	if ($filaCliente['fInicio'] >= $fecha_a AND $filaCliente['fInicio'] <= $fecha_b AND $filaCliente['tipo'] == $tipoAnimal) {
					        		$tabla.=
						            '<tr>
						                <td>'.$filaCliente['idAnimal'].'</td>
						                <td>'.$filaCliente['arete'].'</td>
						                <td>'.$filaCliente['tipo'].'</td>
						                <td>'.$filaCliente['tipoSalida'].'</td>
						                <td>'.$filaCliente['fInicio'].'</td>
						                <td>'.$filaCliente['fFinal'].'</td>
						                <td>'.$filaCliente['precio'].'</td>
						            </tr>
						            ';
					        	}
					        }
					    $tabla.='</table>';
					} else
					    {
					        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
					    }
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