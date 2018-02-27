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
if(isset($_POST['cliente_b']))
{
	$q=$db->real_escape_string($_POST['cliente_b']);
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
            </tr>
            ';
        }

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>