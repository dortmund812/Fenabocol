<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (!empty($_SESSION) && $_SESSION['rol'] == 'donante') {
	require_once '../../../views/donante/configuracion/configuracion.view.php';
} else {
	header('location: '.RUTA);
	die();
}
