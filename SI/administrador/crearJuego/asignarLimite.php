<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';
if (isset($_POST['limite'])) {
	$ultima = traerJugadaFinal();
	if (!empty($ultima)) {
		registrarLimiteJugada($conexion, $limite);
		$salida .= 'Exito';
	} else {
		modificarLimiteJuegada($conexion, $limite, $ultima[0]);
		$salida .= 'Modificada';
	}
} else {
	$salida .= 'Error';
}

echo $salida;
?>