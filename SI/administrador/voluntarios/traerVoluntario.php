<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';
if (!empty($_SESSION) && $_SESSION['jugador'] == 'fenabocolorg@gmail.com') {
	if (isset($_POST['id'])) {
		$id = numero($_POST['id']);
		$salida = traerDatosVoluntarios($conexion, $id);
	}
}
echo json_encode($salida);