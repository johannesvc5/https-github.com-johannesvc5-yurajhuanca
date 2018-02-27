<?php

require_once '../conexion.php';

$tabla="";
$query="SELECT
        salida.idSalida,
        salida.tipoSalida,
        salida.fInicio,
        salida.fFinal,
        salida.precio,
        salida.idAnimal,
        animal.tipo,
        animal.arete
        FROM
        salida
        INNER JOIN animal ON salida.idAnimal = animal.idAnimal 
        ORDER BY salida.idSalida";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['cliente']))
{
	$q=$db->real_escape_string($_POST['cliente']);
	$query="SELECT
        salida.idSalida,
        salida.tipoSalida,
        salida.fInicio,
        salida.fFinal,
        salida.precio,
        salida.idAnimal,
        animal.tipo,
        animal.arete
        FROM
        salida
        INNER JOIN animal ON salida.idAnimal = animal.idAnimal WHERE 
		animal.arete LIKE '%".$q."%'";
}

$buscarCliente=$db->query($query);
if ($buscarCliente->num_rows > 0)
{
	$tabla.= 
	'<table class="table table-striped col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; max-width:100%;">
        <tr>
            <th>ID</th>
            <th>Tipo Salida</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Precio</th>
            <th>Id Animal</th>
            <th>T. Animal</th>
            <th>Arete</th>
            <th>Editar</th>
        </tr>';
	while($filaCliente= $buscarCliente->fetch_assoc())
	    {
             $tabla.=
            '<tr>
                <td>'.$filaCliente['idSalida'].'</td>
                <td>'.$filaCliente['tipoSalida'].'</td>
                <td>'.$filaCliente['fInicio'].'</td>

                <td>'.$filaCliente['fFinal'].'</td>
                <td>'.$filaCliente['precio'].'</td>
                <td>'.$filaCliente['idAnimal'].'</td>
                <td>'.$filaCliente['tipo'].'</td>
                <td>'.$filaCliente['arete'].'</td>
                <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editSalida'.$filaCliente['idSalida'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="font-size:10px"></span> Editar</button></td>
            </tr>
            ';
            echo '<!-- Modal -->
                    <div class="modal fade" id="editSalida'.$filaCliente['idSalida'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h2 class="modal-title text-center" id="exampleModalLabe2">Editar Datos de Salida</h2>
                            </div>
                            <div class="modal-body">
                                <form class="formulario" action="salidaEdit.php" method="post">
                                    <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                            <label for="sexo">Tipo de Salida:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-heart"></span></span>
                                                <input type="text" class="form-control" name="tipoSalida" value="'.$filaCliente['tipoSalida'].'" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                            <label for="fInicio">Fecha de Inicio:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                                <input type="date" class="form-control" name="fInicio" value="'.$filaCliente['fInicio'].'" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                            <label for="fFinal">Fecha Final:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                                <input type="date" class="form-control" name="fFinal" value="'.$filaCliente['fFinal'].'" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                            <label for="precio">Precio:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                                <input type="text" class="form-control" name="precio" value="'.$filaCliente['precio'].'" required>
                                            </div>
                                        </div> 
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                            <label for="arete">Arete del Animal:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                                <input type="text" class="form-control" name="arete" value="'.$filaCliente['arete'].'" required>
                                            </div>
                                        </div>  
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                            <label for="arete">Id Salida:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                                <input type="text" class="form-control" name="idSalida" value="'.$filaCliente['idSalida'].'" required>
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