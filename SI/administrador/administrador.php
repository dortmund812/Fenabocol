<?php session_start();
require_once '../../config/config.php';
require_once '../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (!empty($_SESSION) && $_SESSION['jugador'] == 'fenabocolorg@gmail.com') {
	require_once '../../views/administrador/administrador.view.php';
	die();
} else {
	header('location: ../../index.php');
	die();
}

?>