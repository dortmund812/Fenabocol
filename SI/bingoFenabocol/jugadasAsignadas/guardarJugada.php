<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (isset($_POST['jugada_1'])
	&& isset($_POST['jugada_2'])
	&& isset($_POST['jugada_3'])
	&& isset($_POST['jugada_4'])
	&& isset($_POST['jugada_5'])
	&& isset($_POST['jugada_6'])
	&& isset($_POST['fechaUp'])
	&& isset($_POST['idfila'])) {
	
	if (!empty($_SESSION)) {
		
		$jugada_1 = limpiarDatos($_POST['jugada_1']);
		$jugada_2 = limpiarDatos($_POST['jugada_2']);
		$jugada_3 = limpiarDatos($_POST['jugada_3']);
		$jugada_4 = limpiarDatos($_POST['jugada_4']);
		$jugada_5 = limpiarDatos($_POST['jugada_5']);
		$jugada_6 = limpiarDatos($_POST['jugada_6']);
		$fechaUp = limpiarDatos($_POST['fechaUp']);
		$idfila = limpiarDatos($_POST['idfila']);
		$correo = $_SESSION['jugador'];

		$idjugador = traerIDCorreo($conexion, $correo);
		$validarCodigo = buscarCodigoAsignado($conexion, $idfila);

		if (!empty($validarCodigo) AND $validarCodigo['jugada_1'] == '') {

			modificarJugadaAsignada($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6, $idfila, $idjugador[0], $fechaUp);

			$salida .= 'Exito';
		} else {
			$salida .= 'JugadaRegistrada';
		}


	} else {
		$salida .= 'ErrorSesion';
	}

} else {
	$salida .= 'ErrorDatos';
}

echo $salida;

?>