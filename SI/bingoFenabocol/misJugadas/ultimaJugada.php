<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (!empty($_SESSION)) {
	$jugada = traerJugadaFinal($conexion);
	if (!empty($jugada)) {
		$salida = $jugada[1] . ' - ' . $jugada[2] . ' - ' . $jugada[3] . ' - ' . $jugada[4] . ' - ' . $jugada[5] . ' - ' . $jugada[6];
	} else {
		$salida .= 'Error';
	}
} else {
	$salida .= 'Error';
}

echo $salida;
?>