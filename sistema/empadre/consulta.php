<?php

require_once '../conexion.php';

$tabla="";
$query="SELECT
        empadrado.idEmpadrado,
        empadrado.fechaEmp,
        empadrado.observaciones
        FROM
        empadrado
        ORDER BY empadrado.idEmpadrado";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['cliente']))
{
	$q=$db->real_escape_string($_POST['cliente']);
	$query="SELECT * FROM empadrado WHERE 
		empadrado.idEmpadrado LIKE '%".$q."%'";
}

$buscarCliente=$db->query($query);
if ($buscarCliente->num_rows > 0)
{
	$tabla.= 
	'<table class="table table-striped col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; max-width:100%;">
        <tr>
            <th>ID</th>
            <th>Fecha Empadre</th>
            <th>Observaciones</th>
            <th>Editar</th>
            <th>Padres</th>
            <th>Servicio</th>
            <th>Gestación</th>
        </tr>';
	while($filaCliente= $buscarCliente->fetch_assoc())
	    {
            $tabla.=
            '<tr>
                <td>'.$filaCliente['idEmpadrado'].'</td>
                <td>'.$filaCliente['fechaEmp'].'</td>
                <td>'.$filaCliente['observaciones'].'</td>
                <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editEmpadre'.$filaCliente['idEmpadrado'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="font-size:10px"></span> Editar</button></td>
                <td><button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#addPadres'.$filaCliente['idEmpadrado'].'"><span class="glyphicon glyphicon-user" aria-hidden="true" style="font-size:10px"></span> Agregar</button></td>
                <td><button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#addServicio'.$filaCliente['idEmpadrado'].'"><span class="glyphicon glyphicon-ok" aria-hidden="true" style="font-size:10px"></span> Añadir</button></td>
                <td><button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#addGestacion'.$filaCliente['idEmpadrado'].'"><span class="glyphicon glyphicon-heart" aria-hidden="true" style="font-size:10px"></span> Registrar</button></td>
            </tr>
            ';
            echo '<!-- Modal Editar Empadre-->
                <div class="modal fade" id="editEmpadre'.$filaCliente['idEmpadrado'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title text-center" id="exampleModalLabe2">Editar Registro de Empadre</h2>
                        </div>
                        <div class="modal-body">
                            <form class="formulario" action="empadreEdit.php" method="post">
                                <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                                    <div class="col-lg-6" style="margin-top: 8px">
                                        <label for="fEmpadre" class="text-left">Fecha Empadre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tag"></span></span>
                                                <input type="date" class="form-control" name="fEmpadre" value="'.$filaCliente['fechaEmp'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">Observaciones:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="observacionGeneral" value="'.$filaCliente['observaciones'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">ID Empadre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="idEmpadre" value="'.$filaCliente['idEmpadrado'].'" required>
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
            echo '<!-- Modal Agregar Padres-->
                <div class="modal fade" id="addPadres'.$filaCliente['idEmpadrado'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title text-center" id="exampleModalLabe2">Añadir Registro de Padres</h2>
                        </div>
                        <div class="modal-body">
                            <form class="formulario" action="addPadres.php" method="post">
                                <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">Arete Padre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="aPadre" placeholder="Ingrese Arete del Padre" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">Arete Madre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="aMAdre" placeholder="Ingrese Arete de la Madre" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">ID Empadre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="idEmpadre" value="'.$filaCliente['idEmpadrado'].'" required>
                                        </div>
                                    </div>
                                </div>
                                    
                                <button type="submit" class="btn btn-primary col-lg-offset-9" style="margin-bottom: 5px"><span class="glyphicon glyphicon-log-in"></span> Añadir</button>                   
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn center-block btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Fin Modal-->';
            echo '<!-- Modal Agregar Servicios-->
                <div class="modal fade" id="addServicio'.$filaCliente['idEmpadrado'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title text-center" id="exampleModalLabe2">Añadir Servicios de Empadre</h2>
                        </div>
                        <div class="modal-body">
                            <form class="formulario" action="addServicio.php" method="post">
                                <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">Fecha:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="date" class="form-control" name="fecha" placeholder="Ingrese Fecha" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="copula">Tiempo de Copula (min):</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="tiempo" placeholder="Ingrese Tiempo de Copula (min)" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="observciones">Observaciones:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="observaciones" placeholder="Ingrese Observaciones" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">ID Empadre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="idEmpadre" value="'.$filaCliente['idEmpadrado'].'" required>
                                        </div>
                                    </div>
                                </div>
                                    
                                <button type="submit" class="btn btn-primary col-lg-offset-9" style="margin-bottom: 5px"><span class="glyphicon glyphicon-log-in"></span> Añadir</button>                   
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn center-block btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Fin Modal-->';
            echo '<!-- Modal Agregar Gestación-->
                <div class="modal fade" id="addGestacion'.$filaCliente['idEmpadrado'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title text-center" id="exampleModalLabe2">Añadir Gestación</h2>
                        </div>
                        <div class="modal-body">
                            <form class="formulario" action="addGestacion.php" method="post">
                                <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="fecha">Fecha de Nacimiento:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="date" class="form-control" name="fecha" placeholder="Ingrese Fecha de Nacimiento" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="arete">Arete:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tag"></span></span>
                                            <input type="text" class="form-control" name="arete" placeholder="Ingrese Arete" required>
                                        </div>
                                    </div>       
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="sexo">Sexo:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-heart"></span></span>
                                            <select  class="form-control" name="sexo" id="sexo" required  >
                                                <option value="macho">Macho</option>
                                                <option value="hembra">Hembra</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="parto">Tipo de Parto:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-piggy-bank"></span></span>
                                            <input type="text" class="form-control" name="parto" placeholder="Ingrese Tipo de Parto" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="peso">Peso:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-download-alt"></span></span>
                                            <input type="text" class="form-control" name="peso" placeholder="Ingrese Peso" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">ID Empadre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="idEmpadre" value="'.$filaCliente['idEmpadrado'].'" required>
                                        </div>
                                    </div>
                                </div>
                                    
                                <button type="submit" class="btn btn-primary col-lg-offset-9" style="margin-bottom: 5px"><span class="glyphicon glyphicon-log-in"></span> Añadir</button>                   
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