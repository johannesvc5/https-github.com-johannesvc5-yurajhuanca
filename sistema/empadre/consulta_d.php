<?php

require_once '../conexion.php';

$tabla="";
$query="SELECT
        gestacion.idGestacion,
        gestacion.fNacimiento,
        gestacion.areteCria,
        gestacion.sexo,
        gestacion.tipoParto,
        gestacion.peso,
        empadrado.idEmpadrado,
        animal.tipo
        FROM
        gestacion
        INNER JOIN empadrado ON gestacion.idEmpadrado = empadrado.idEmpadrado
        INNER JOIN padre ON padre.idEmpadrado = empadrado.idEmpadrado
        INNER JOIN animal ON padre.idAnimal = animal.idAnimal GROUP BY gestacion.idGestacion";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['cliente_d']))
{
    $q=$db->real_escape_string($_POST['cliente_d']);
    $query="SELECT
            gestacion.idGestacion,
            gestacion.fNacimiento,
            gestacion.areteCria,
            gestacion.sexo,
            gestacion.tipoParto,
            gestacion.peso,
            empadrado.idEmpadrado,
            animal.tipo
            FROM
            gestacion
            INNER JOIN empadrado ON gestacion.idEmpadrado = empadrado.idEmpadrado
            INNER JOIN padre ON padre.idEmpadrado = empadrado.idEmpadrado
            INNER JOIN animal ON padre.idAnimal = animal.idAnimal
            WHERE 
            gestacion.idGestacion LIKE '%".$q."%'
            GROUP BY gestacion.idGestacion";
}

$buscarCliente=$db->query($query);
if ($buscarCliente->num_rows > 0)
{
	$tabla.= 
	'<table class="table table-striped col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; max-width:100%;">
        <tr>
            <th>ID</th>
            <th>F. Nacimiento</th>
            <th>Arete</th>
            <th>Sexo</th>
            <th>T. Parto</th>
            <th>Peso</th>
            <th>ID Emp.</th>
            <th>Tipo</th>
            <th>Editar</th>
        </tr>';
	while($filaCliente= $buscarCliente->fetch_assoc())
	    {
            $tabla.=
            '<tr>
                <td>'.$filaCliente['idGestacion'].'</td>
                <td>'.$filaCliente['fNacimiento'].'</td>
                <td>'.$filaCliente['areteCria'].'</td>
                <td>'.$filaCliente['sexo'].'</td>
                <td>'.$filaCliente['tipoParto'].'</td>
                <td>'.$filaCliente['peso'].'</td>
                <td>'.$filaCliente['idEmpadrado'].'</td>
                <td>'.$filaCliente['tipo'].'</td>
                <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editGestacion'.$filaCliente['idGestacion'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="font-size:10px"></span> Editar</button></td>
            </tr>
            ';
            echo '<!-- Modal Agregar Gestación-->
                <div class="modal fade" id="editGestacion'.$filaCliente['idGestacion'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title text-center" id="exampleModalLabe2">Añadir Gestación</h2>
                        </div>
                        <div class="modal-body">
                            <form class="formulario" action="editGestacion.php" method="post">
                                <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="fecha">Fecha de Nacimiento:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
                                            <input type="date" class="form-control" name="fecha" value="'.$filaCliente['fNacimiento'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="arete">Arete:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tag"></span></span>
                                            <input type="text" class="form-control" name="arete" value="'.$filaCliente['areteCria'].'" required>
                                        </div>
                                    </div>       
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="sexo">Sexo:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-heart"></span></span>
                                            <input type="text" class="form-control" name="sexo" value="'.$filaCliente['sexo'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="parto">Tipo de Parto:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-piggy-bank"></span></span>
                                            <input type="text" class="form-control" name="parto" value="'.$filaCliente['tipoParto'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="peso">Peso:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-download-alt"></span></span>
                                            <input type="text" class="form-control" name="peso" value="'.$filaCliente['peso'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">ID Empadre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="idGestacion" value="'.$filaCliente['idGestacion'].'" required>
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