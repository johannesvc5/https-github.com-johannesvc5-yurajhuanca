<?php

require_once '../../conexion.php';
require('../../../fpdf/fpdf.php');

$tabla="";
$query="SELECT * FROM
        animal
        LEFT OUTER JOIN salida ON salida.idAnimal = animal.idAnimal
        WHERE salida.idSalida IS NULL AND animal.tipo ='vacuno'";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['cliente_c']))
{
	$q=$db->real_escape_string($_POST['cliente_c']);
	$query="SELECT * FROM
            animal
            LEFT OUTER JOIN salida ON salida.idAnimal = animal.idAnimal WHERE 
    		animal.arete LIKE '%".$q."%'
            AND salida.idSalida IS NULL";
}

$buscarCliente=$db->query($query);if ($buscarCliente->num_rows > 0)
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
        </tr>';
    while($filaCliente= $buscarCliente->fetch_assoc())
        if ($filaCliente['tipo'] == 'vacuno') {
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