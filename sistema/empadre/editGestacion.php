<?php

$fecha = $_POST['fecha'];
$arete = $_POST['arete'];
$sexo = $_POST['sexo'];
$parto = $_POST['parto'];
$peso = $_POST['peso'];
$idGestacion = $_POST['idGestacion'];

require_once '../conexion.php';

//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;

$query = " UPDATE gestacion SET fNacimiento = '$fecha', areteCria = '$arete', sexo = '$sexo', tipoParto = '$parto', peso = '$peso' WHERE idGestacion = '$idGestacion'";

if ( $db->query($query) ) {
    header('Location: empadre.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}
