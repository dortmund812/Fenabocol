<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}

if (!empty($_SESSION) && $_SESSION['rol'] == 'donante') {
	require_once '../../../views/donante/crearJugadas/crearJugadas.view.php';
} else {
	header('Location: '.RUTA);
	die();
}