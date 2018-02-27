<?php

$tipoSalida = $_POST['tipoSalida'];
$fInicio = $_POST['fInicio'];
$fFinal = $_POST['fFinal'];
$precio = $_POST['precio'];
$arete = $_POST['arete'];
$idSalida = $_POST['idSalida'];

require_once '../conexion.php';

//print_r("holaaa");exit();

//echo $llegada, $salida, $procedencia, $destino, $descuento, $pago, $habitacion, $cliente;

$select = "SELECT animal.idAnimal FROM animal WHERE animal.arete = '$arete'";

$resultado = mysqli_query($db,$select);
while($fila=mysqli_fetch_array($resultado)){
	$areteSalida = $fila[0];
}

$query = " UPDATE salida SET 
			tipoSalida = '$tipoSalida', 
			fInicio = '$fInicio', 
			fFinal = '$fFinal', 
			precio = '$precio', 
			idAnimal = '$areteSalida' 
			WHERE idSalida = '$idSalida'";

if ( $db->query($query) ) {
    header('Location: salida.php');
    echo '<script language="javascript">alert("Edicion registrada con exito");</script>';   
}
