<?php

$fEmpadre = $_POST['fEmpadre'];
$observacionGeneral = $_POST['observacionGeneral'];
$idEmpadre = $_POST['idEmpadre'];

require_once '../conexion.php';

//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;
$query = " UPDATE empadrado SET fechaEmp = '$fEmpadre', observaciones = '$observacionGeneral' WHERE idEmpadrado = '$idEmpadre'";

if ( $db->query($query) ) {
    header('Location: empadre.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}