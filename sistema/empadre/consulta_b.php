<?php

require_once '../conexion.php';

$tabla="";
$query="SELECT
        padre.idPadre,
        animal.tipo,
        animal.arete,
        animal.registro,
        animal.sexo,
        empadrado.fechaEmp,
        padre.idAnimal,
        padre.idEmpadrado
        FROM
        empadrado
        INNER JOIN padre ON padre.idEmpadrado = empadrado.idEmpadrado
        INNER JOIN animal ON padre.idAnimal = animal.idAnimal";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['cliente_b']))
{
	$q=$db->real_escape_string($_POST['cliente_b']);
	$query="SELECT
            padre.idPadre,
            animal.tipo,
            animal.arete,
            animal.registro,
            animal.sexo,
            empadrado.fechaEmp,
            padre.idAnimal,
            padre.idEmpadrado
            FROM
            empadrado
            INNER JOIN padre ON padre.idEmpadrado = empadrado.idEmpadrado
            INNER JOIN animal ON padre.idAnimal = animal.idAnimal WHERE 
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
            <th>R.G.</th>
            <th>Sexo</th>
            <th>F. Empadre</th>
            <th>Id Animal</th>
            <th>Id. Empadre</th>
            <th>Editar</th>
        </tr>';
	while($filaCliente= $buscarCliente->fetch_assoc())
	    {
            $tabla.=
            '<tr>
                <td>'.$filaCliente['idPadre'].'</td>
                <td>'.$filaCliente['tipo'].'</td>
                <td>'.$filaCliente['arete'].'</td>
                <td>'.$filaCliente['registro'].'</td>
                <td>'.$filaCliente['sexo'].'</td>
                <td>'.$filaCliente['fechaEmp'].'</td>
                <td>'.$filaCliente['idAnimal'].'</td>
                <td>'.$filaCliente['idEmpadrado'].'</td>
                <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editPadre'.$filaCliente['idPadre'].'"><span class="glyphicon glyphicon-pencil" aria-hidden="true" style="font-size:10px"></span> Editar</button></td>
            </tr>
            ';
            echo '<!-- Modal Agregar Padres-->
                <div class="modal fade" id="editPadre'.$filaCliente['idPadre'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h2 class="modal-title text-center" id="exampleModalLabe2">Editar Registro de Padres</h2>
                        </div>
                        <div class="modal-body">
                            <form class="formulario" action="editPadre.php" method="post">
                                <div class="form-group col-lg-10 col-lg-offset-1 col-md-10">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">Arete Padre o Madre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-list-alt"></span></span>
                                            <input type="text" class="form-control" name="aPadre" placeholder="Ingrese Arete del Padre o Madre" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 8px">
                                        <label for="registro">ID Padre o Madre:</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                            <input type="text" class="form-control" name="idPadre" value="'.$filaCliente['idPadre'].'" required>
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