<?php

$aPadre = $_POST['aPadre'];
$idPadre = $_POST['idPadre'];

require_once '../conexion.php';

$select = "SELECT animal.idAnimal FROM animal WHERE animal.arete = '$aPadre'";

$resultado = mysqli_query($db,$select);
while($fila=mysqli_fetch_array($resultado)){
	$idAnimal = $fila[0];
}

//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;
$query = " UPDATE padre SET idAnimal = '$idAnimal' WHERE idPadre = '$idPadre'";

if ( $db->query($query) ) {
    header('Location: empadre.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}