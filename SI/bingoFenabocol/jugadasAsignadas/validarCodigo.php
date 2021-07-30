<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (isset($_POST['codigo'])) {
	$cod = limpiarDatos($_POST['codigo']);
	$codigo = buscarCodigoAsignado($conexion, $cod);
	if (!empty($codigo)) {
		if ($codigo['estado'] == 2 AND $codigo['jugada_1'] == '') {
			$salida .= 'Exito';
		} else {
			$salida .= 'Error1';
		}
	} else {
		$salida .= 'Error2';
	}
} else {
	$salida .= 'Error3';
}

echo $salida;

?>