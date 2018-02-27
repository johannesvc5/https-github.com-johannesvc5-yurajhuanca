<?php

require_once '../conexion.php';

$tabla="";
$query="SELECT
        servicio.idServicio,
        servicio.fecha,
        servicio.tiempoCopula,
        servicio.observaciones,
        empadrado.fechaEmp,
        servicio.idEmpadrado
        FROM
        servicio
        INNER JOIN empadrado ON servicio.idEmpadrado = empadrado.idEmpadrado ORDER BY servicio.idServicio";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['cliente_c']))
{
	$q=$db->real_escape_string($_POST['cliente_c']);
	$query="SELECT
        servicio.idServicio,
        servicio.fecha,
        servicio.tiempoCopula,
        servicio.observaciones,
        empadrado.fechaEmp,
        servicio.idEmpadrado
        FROM
        servicio
        INNER JOIN empadrado ON servicio.idEmpadrado = empadrado.idEmpadrado WHERE 
		servicio.idServicio LIKE '%".$q."%'";
}

$buscarCliente=$db->query($query);
if ($buscarCliente->num_rows > 0)
{
	$tabla.= 
	'<table class="table table-striped col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; max-width:100%;">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>T. Copula</th>
            <th>Observaciones</th>
            <th>Fecha Emp.</th>
            <th>ID Emp.</th>
            <th>Editar</th>
        </tr>';
	while($filaCliente= $buscarCliente->fetch_assoc())
	    {
            $tabla.=
            '<tr>
                <td>'.$filaCliente['idServicio'].'</td>
                <td>'.$filaCliente['fecha'].'</td>
                <td>'.$filaCliente['tiempoCopula'].'</td>
                <td>'.$filaCliente['observaciones'].'</td>
                <td>'.$filaCliente['fechaEmp'].'</td>
                <td>'.$filaCliente['idEmpadrado'].'</td>
                <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editServicio'.$filaCliente['idServicio'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="font-size:10px"></span> Editar</button></td>
            </tr>
            ';
            echo '<!-- Modal Agregar Servicios-->
                <div class="modal fade" id="editServicio'.$filaCliente['idServicio'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title text-center" id="exampleModalLabe2">Añadir Servicios de Empadre</h2>
                        </div>
                        <div class="modal-body">
                            <form class="formulario" action="editServicio.php" method="post">
                                <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">Fecha:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="date" class="form-control" name="fecha" value="'.$filaCliente['fecha'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="copula">Tiempo de Copula (min):</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="tiempo" value="'.$filaCliente['tiempoCopula'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="observciones">Observaciones:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="observaciones" value="'.$filaCliente['observaciones'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">ID Servicio:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="idServicio" value="'.$filaCliente['idServicio'].'" required>
                                        </div>
                                    </div>
                                </div>
                                    
                                <button type="submit" class="btn btn-primary col-lg-offset-9" style="margin-bottom: 5px"><span class="glyphicon glyphicon-log-in"></span> Editar</button>                   
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn center-block btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Fin Modal-->';
        }

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>