<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (isset($_POST['jugada'])) {
	confirmarJugada($conexion, $_POST['jugada']);
	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}

echo $salida;
?>