<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (!empty($_SESSION)) {
	if (isset($_POST['jugada_1'])
		&& isset($_POST['jugada_2'])
		&& isset($_POST['jugada_3'])
		&& isset($_POST['jugada_4'])
		&& isset($_POST['jugada_5'])
		&& isset($_POST['jugada_6'])
		&& isset($_POST['fecha'])) {
		
		$jugada_1 = limpiarDatos($_POST['jugada_1']);
		$jugada_2 = limpiarDatos($_POST['jugada_2']);
		$jugada_3 = limpiarDatos($_POST['jugada_3']);
		$jugada_4 = limpiarDatos($_POST['jugada_4']);
		$jugada_5 = limpiarDatos($_POST['jugada_5']);
		$jugada_6 = limpiarDatos($_POST['jugada_6']);
		$fecha = limpiarDatos($_POST['fecha']);

		// registrarJugadaFinal($conexion, 'b', 'i', 'n', 'g', 'o', '01');
		$ganadores = buscarPrimerPuesto($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6);
		registrarJugadaFinal($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6, $fecha, $ganadores[0]);

		$salida = 'Exito';

	} else {
		$salida = 'ErrorDatos';
	}
} else {
	$salida = 'ErrorSesion';
}

echo $salida;

?>