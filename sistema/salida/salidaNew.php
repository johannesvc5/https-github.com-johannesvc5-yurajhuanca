<?php

$tipo = $_POST['tipo'];
$fInicio = $_POST['fInicio'];

$fFinal = $_POST['fFinal'];
$precio = $_POST['precio'];
$arete = $_POST['arete'];

require_once '../conexion.php';

//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;

$select = "SELECT animal.idAnimal FROM animal WHERE animal.arete = '$arete'";

$resultado = mysqli_query($db,$select);
while($fila=mysqli_fetch_array($resultado)){
	$idAniSalida = $fila[0];
}

$query = " INSERT INTO salida (tipoSalida, fInicio, fFinal, precio, idAnimal) VALUES ('$tipo', '$fInicio', '$fFinal', '$precio', '$idAniSalida')";

if ( $db->query($query) ) {
    header('Location: salida.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}
