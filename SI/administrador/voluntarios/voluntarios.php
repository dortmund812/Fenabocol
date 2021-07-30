<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}

if (!empty($_SESSION) && $_SESSION['jugador'] == 'fenabocolorg@gmail.com') {
	$voluntarios = traerListaVoluntarios($conexion);
	$tipos = traerTipoRegistroJugada($conexion);
	require_once '../../../views/administrador/voluntarios/voluntarios.view.php';
} else {
	header('Location: '.RUTA);
	die('Usuario no autorizado');
}
require_once '../../../views/administrador/voluntarios/voluntarios.view.php';