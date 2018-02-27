<?php

$fecha = $_POST['fecha'];
$tiempo = $_POST['tiempo'];
$observaciones = $_POST['observaciones'];
$idEmpadre = $_POST['idEmpadre'];

require_once '../conexion.php';

//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;
$query = " INSERT INTO servicio (fecha, tiempoCopula, observaciones, idEmpadrado) VALUES ('$fecha', '$tiempo', '$observaciones', '$idEmpadre')";

if ( $db->query($query) ) {
    header('Location: empadre.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}
