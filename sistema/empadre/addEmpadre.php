<?php

$fEmpadre = $_POST['fEmpadre'];
$observacionGeneral = $_POST['observacionGeneral'];

require_once '../conexion.php';

//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;
$query = " INSERT INTO empadrado (fechaEmp, observaciones) VALUES ('$fEmpadre', '$observacionGeneral')";

if ( $db->query($query) ) {
    header('Location: empadre.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}
