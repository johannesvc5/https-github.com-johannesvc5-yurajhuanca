<?php

require_once '../conexion.php';

$tabla="";
$query="SELECT * FROM animal WHERE
        animal.tipo = 'borrego'
        ORDER BY animal.idAnimal";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['cliente']))
{
	$q=$db->real_escape_string($_POST['cliente']);
	$query="SELECT * FROM animal WHERE 
		animal.arete LIKE '%".$q."%'";
}

$buscarCliente=$db->query($query);
if ($buscarCliente->num_rows > 0)
{
	$tabla.= 
	'<table class="table table-striped col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px; max-width:100%;">
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Arete</th>
            <th>Registro</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>C. Corporal</th>
            <th>Tatuaje</th>
            <th>O. IZQ.</th>
            <th>O. DER.</th>
            <th>Observaciones</th>
            <th>Pastor</th>
            <th>Editar</th>
        </tr>';
	while($filaCliente= $buscarCliente->fetch_assoc())
	    if ($filaCliente['tipo'] == 'borrego') {
            {
                $tabla.=
                '<tr>
                    <td>'.$filaCliente['idAnimal'].'</td>
                    <td>'.$filaCliente['tipo'].'</td>
                    <td>'.$filaCliente['arete'].'</td>
                    <td>'.$filaCliente['registro'].'</td>
                    <td>'.$filaCliente['edad'].'</td>
                    <td>'.$filaCliente['sexo'].'</td>
                    <td>'.$filaCliente['condCorp'].'</td>
                    <td>'.$filaCliente['tatuaje'].'</td>
                    <td>'.$filaCliente['tatIzq'].'</td>
                    <td>'.$filaCliente['tatDer'].'</td>
                    <td>'.$filaCliente['observaciones'].'</td>
                    <td>'.$filaCliente['idPastor'].'</td>
                    <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editBorrego'.$filaCliente['idAnimal'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="font-size:10px"></span></button></td>
                </tr>
                ';
                echo '<!-- Modal -->
                <div class="modal fade" id="editBorrego'.$filaCliente['idAnimal'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title text-center" id="exampleModalLabe2">Editar Registro de Borregos</h2>
                        </div>
                        <div class="modal-body">
                            <form class="formulario" action="borregoEdit.php" method="post">
                                <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                                    <div class="col-lg-6" style="margin-top: 8px">
                                        <label for="Arete" class="text-left">Arete:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-tag"></span></span>
                                                <input type="text" class="form-control" name="arete" value="'.$filaCliente['arete'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">Registro:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="registro" value="'.$filaCliente['registro'].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="tipo">Tipo de Animal:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-piggy-bank"></span></span>
                                            <select  class="form-control" name="tipo" id="tipo" required  >
                                                <option value="borrego">Borregos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="tat_izq">Tatuaje Oreja Izquierda:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-chevron-left"></span></span>
                                            <input type="text" class="form-control" name="tat_izq" value="'.$filaCliente['tatIzq'].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="tat_der">Tatuaje Oreja Derecha:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-chevron-right"></span></span>
                                            <input type="text" class="form-control" name="tat_der" value="'.$filaCliente['tatDer'].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="edad">Edad:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-gift"></span></span>
                                            <input type="text" class="form-control" name="edad" value="'.$filaCliente['edad'].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="sexo">Sexo:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-heart"></span></span>
                                            <input type="text" class="form-control" name="sexo" value="'.$filaCliente['sexo'].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="cond_corp">Condicion Corporal:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="cond_corp" value="'.$filaCliente['condCorp'].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="tatuaje">Tatuaje:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-fire"></span></span>
                                            <input type="text" class="form-control" name="tatuaje" value="'.$filaCliente['tatuaje'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="pastor">Pastor Encargado:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-comment"></span></span>
                                            <input type="text" class="form-control" name="pastor" value="'.$filaCliente['idPastor'].'" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="observaciones">Observaciones:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-comment"></span></span>
                                            <input type="text" class="form-control" name="observaciones" value="'.$filaCliente['observaciones'].'">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="observaciones">Id Animal:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="idAnimal" value="'.$filaCliente['idAnimal'].'">
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
        }

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>