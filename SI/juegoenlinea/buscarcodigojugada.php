<?php 
require_once '../../config/config.php';
require_once '../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = [
	['','',''],
	['','','','','',''],
	['b','41','n','7','o','1']
];

if (isset($_POST['codigo'])) {
	$codigo = limpiarDatos($_POST['codigo']);
	$jugada = buscarJugadaRapida($conexion, $codigo);
	$resultado = buscarResultadoJugadaRapida($conexion, $codigo);

	if (strlen($codigo) == 8) {
		if(!empty($jugada)){
			$salida[2] = [$jugada[0],$jugada[1],$jugada[2],$jugada[3],$jugada[4],$jugada[5]];

			if(!empty($resultado)){
				$salida[1] = [$resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4],$resultado[5]];
				$salida[0] = ['info','Codigo encontrado','El codigo "'.$codigo.'" ha sido verificado y ya ha sido jugado. para jugar de nuevo utilice un nuevo codigo.'];
			} else {
				$salida[1] = ['','','','','',''];
				$salida[0] = ['info','Codigo encontrado','El codigo "'.$codigo.'" ha sido verificado y esta disponible para jugar.'];
			}
		} else {
			$salida[2] = ['','','','','',''];
			$salida[0] = ['info','Codigo verificado','El codigo "'.$codigo.'" no ha sido usado y esta disponible para realizar su jugada.'];
		}
	} else {
		$salida[0] = 'error';
		$salida[1] = 'Error de codigo';
		$salida[2] = 'El cogido registrado no cumple con los parametros, ingrese un codigo valido.';
	}
}

echo json_encode($salida);