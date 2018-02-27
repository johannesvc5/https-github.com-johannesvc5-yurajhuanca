<?php

$fecha = $_POST['fecha'];
$arete = $_POST['arete'];
$sexo = $_POST['sexo'];
$parto = $_POST['parto'];
$peso = $_POST['peso'];
$idEmpadre = $_POST['idEmpadre'];

require_once '../conexion.php';

//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;
$query = " INSERT INTO gestacion (fNacimiento, areteCria, sexo, tipoParto, peso, idEmpadrado) VALUES ('$fecha', '$arete', '$sexo', '$parto', '$peso','$idEmpadre')";

if ( $db->query($query) ) {
    header('Location: empadre.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}
