<?php 
require_once '../../config/config.php';
require_once '../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}

$salida = [];

if (isset($_POST['codigo'])) {
	$codigo = limpiarDatos($_POST['codigo']);

	if(buscarJuegoRapido($conexion, $codigo)){
		$data = actualizarDatosJugadaRapida($conexion, $codigo);
		if($data[3] == '0000/00/00'){
			$data[3] = $data[2];
		}
		$salida = [$data[0],$data[1],fecha($data[2]),fecha($data[3])];
	} else {
		$salida = ['Pendiente','Pendiente','--/--/--','--/--/--'];
	}
}

echo json_encode($salida);