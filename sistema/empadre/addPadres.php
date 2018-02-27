<?php

$aPadre = $_POST['aPadre'];
$aMAdre = $_POST['aMAdre'];
$idEmpadre = $_POST['idEmpadre'];

require_once '../conexion.php';

$select = "SELECT animal.idAnimal FROM animal WHERE animal.arete = '$aPadre'";

$resultado = mysqli_query($db,$select);
while($fila=mysqli_fetch_array($resultado)){
	$aretePadre = $fila[0];
}

$select_b = "SELECT animal.idAnimal FROM animal WHERE animal.arete = '$aMAdre'";

$resultado_b = mysqli_query($db,$select_b);
while($fila_b=mysqli_fetch_array($resultado_b)){
	$areteMadre = $fila_b[0];
}


//print_r($aretePadre); print_r($areteMadre);exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;

$query = " INSERT INTO padre (idAnimal, idEmpadrado) VALUES ('$aretePadre', '$idEmpadre')";

$query2 = " INSERT INTO padre (idAnimal, idEmpadrado) VALUES ('$areteMadre', '$idEmpadre')";

if ( $db->query($query) AND $db->query($query2)) {
    header('Location: empadre.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}
