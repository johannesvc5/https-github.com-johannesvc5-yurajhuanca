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

require_once '../conexion.php';


//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;


$insertar = " INSERT INTO animal (tipo, arete, registro, edad, sexo, condCorp, tatuaje, tatIzq, tatDer, observaciones, idPastor) VALUES ('$tipo', '$arete', '$registro', '$edad', '$sexo', '$cond_corp', '$tatuaje', '$tat_izq', '$tat_der', '$observaciones', '$pastor') ";
	
if ( $db->query($insertar) ) {
    header('Location: animales.php');
    echo '<script language="javascript">alert("Registrado con exito");</script>';
    
}