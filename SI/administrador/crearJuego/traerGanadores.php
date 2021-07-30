<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (!empty($_SESSION)) {
	if (isset($_POST['fecha'])) {
		$fecha = limpiarDatos($_POST['fecha']);
		$j = traerJugadaFinal($conexion);
		$primero = buscarPrimerPuesto($conexion, $j[1], $j[2], $j[3], $j[4], $j[5], $j[6]);
		$segundo = buscarSegundoPuesto($conexion, $j[1], $j[2], $j[3], $j[4], $j[5], $j[6]);
		$tercero = buscarTercerPuesto($conexion, $j[1], $j[2], $j[3], $j[4], $j[5], $j[6]);
		$cuarto = buscarCuartoPuesto($conexion, $j[1], $j[2], $j[3], $j[4], $j[5], $j[6]);
		$ganadores = array('primero' => $primero[0], 'segundo' => $segundo[0], 'tercero' => $tercero[0], 'cuarto' => $cuarto[0]);
		registrarGanador($conexion, $j[1], $j[2], $j[3], $j[4], $j[5], $j[6], $fecha);
		registrarPerdedores($conexion, $fecha);
		$salida = $ganadores;
	} else {
		$salida .= 'Error';
	}		
} else {
	$salida .= 'Error';
}

echo json_encode($salida);
?>