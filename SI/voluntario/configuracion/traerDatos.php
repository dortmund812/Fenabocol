<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';
if (!empty($_SESSION)) {
	$correo = $_SESSION['usuario'];
	$voluntario = traerIDVoluntario($conexion, $correo);
	$datos = traerDatosVoluntarios($conexion, $voluntario);

	if (!empty($datos)) {
		$salida = $datos;
	} else {
		$salida .= 'Error';
	}

} else {
	$salida .= 'Error';
}

echo json_encode($salida);