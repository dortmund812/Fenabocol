<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = [
	['','',''],
	['','','','','',''],
	['','','','','','']
];

if (isset($_POST['codigo'])) {
	$codigo = limpiarDatos($_POST['codigo']);
	$jugada = buscarJugadaRapida($conexion, $codigo);
	$resultado = buscarResultadoJugadaRapida($conexion, $codigo);

	if (strlen($codigo)) {
		if(!empty($jugada)){
			$salida[1] = [$jugada[0],$jugada[1],$jugada[2],$jugada[3],$jugada[4],$jugada[5]];

			if(!empty($resultado)){
				$salida[0] = ['info','Codigo encontrado','El codigo "'.$codigo.'" ha sido verificado y ya ha sido jugado, este codigo no puede guardarse nuevamente.'];
			} else {
				$salida[0] = ['success','Codigo encontrado','El codigo "'.$codigo.'" ha sido verificado, el pago de este codigo esta pendiente.'];
			}
		} else {
			$salida[1] = ['','','','','',''];
			$salida[0] = ['info','Codigo no encontrado','El codigo "'.$codigo.'" no ha sido usado/guardado porlo cual todavia no se tiene registro del codigo y esta disponible.'];
		}

		if(buscarJuegoRapido($conexion, $codigo)){
			$data = actualizarDatosJugadaRapida($conexion, $codigo);
			if($data[3] == '0000/00/00'){
				$data[3] = $data[2];
			}
			$salida[2] = [$data[0],$data[1],fecha($data[2]),fecha($data[3])];
		} else {
			$salida[2] = ['Pendiente','Pendiente','--/--/--','--/--/--'];
		}
	} else {
		$salida[0] = 'error';
		$salida[1] = 'Error de codigo';
		$salida[2] = 'El cogido registrado no cumple con los parametros, ingrese un codigo valido.';
	}
}

echo json_encode($salida);