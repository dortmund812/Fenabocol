<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = [
	array('0' => "",'1' => "",'2' => "",'3' => "",'codigo' => "",'estado' => "",'fechaCrea' => "",'nombreCliente' => "")
];

if (!empty($_SESSION) && $_SESSION['rol'] == 'donante') {
	$donante = traerIDVoluntario($conexion, $_SESSION['usuario']);
	$salida = traerJugadasDonante($conexion, $donante, 1);
}

print json_encode($salida, JSON_UNESCAPED_UNICODE);