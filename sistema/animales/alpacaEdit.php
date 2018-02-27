<?php

$arete = $_POST['arete'];
$registro = $_POST['registro'];
$tipo = $_POST['tipo'];
$tat_izq = $_POST['tat_izq'];
$tat_der = $_POST['tat_der'];
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$cond_corp = $_POST['cond_corp'];
$tatuaje = $_POST['tatuaje'];
$pastor = $_POST['pastor'];
$observaciones = $_POST['observaciones'];
$idAnimal = $_POST['idAnimal'];

require_once '../conexion.php';


//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;
$query = " UPDATE animal SET tipo = '$tipo', arete = '$arete', registro = '$registro', edad = '$edad', sexo = '$sexo', condCorp = '$cond_corp', tatuaje = '$tatuaje', tatIzq = '$tat_izq', tatDer = '$tat_der', observaciones = '$observaciones', idPastor = '$pastor' WHERE idAnimal = '$idAnimal'";

if ( $db->query($query) ) {
    header('Location: animales.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}