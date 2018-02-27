<?php

$fecha = $_POST['fecha'];
$tiempo = $_POST['tiempo'];
$observaciones = $_POST['observaciones'];
$idServicio = $_POST['idServicio'];

require_once '../conexion.php';

//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;

$query = " UPDATE servicio SET fecha = '$fecha', tiempoCopula = '$tiempo', observaciones = '$observaciones'WHERE idServicio = '$idServicio'";

if ( $db->query($query) ) {
    header('Location: empadre.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}
