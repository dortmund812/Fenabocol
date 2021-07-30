<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (isset($_POST['jugada'])) {
	$jugadaBtn = limpiarDatos($_POST['jugada']);
	if (!empty($_SESSION)) {
		$jugada = obtenerJugada($conexion, $jugadaBtn);
		if (!empty($jugada)) {
			$salida = ['jugada_1' => $jugada['jugada_1'],
					'jugada_2' => $jugada['jugada_2'],
					'jugada_3' => $jugada['jugada_3'],
					'jugada_4' => $jugada['jugada_4'],
					'jugada_5' => $jugada['jugada_5'],
					'jugada_6' => $jugada['jugada_6'],
					'pago' => $jugada['pago'],
					'fechaUp' => fecha($jugada['fechaUp']),
					'estado' => $jugada['estado']];
		} else {
			$salida .= 'Error';
		}
	} else {
		$salida .= 'Error';
	}
} else {
	$salida .= 'Error';
}

echo json_encode($salida);
?>