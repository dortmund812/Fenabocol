<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}

$salida = [['info','Registro','No se ha procesado ninguna acción.'],['']];

if (!empty($_SESSION) && $_SESSION['jugador'] == 'fenabocolorg@gmail.com') {
	if (isset($_POST['codigo']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['estado'])) {
		$codigo = limpiarDatos($_POST['codigo']);
		$nombre = limpiarDatos($_POST['nombre']);
		$tipo = numero($_POST['tipo']);
		$estado = numero($_POST['estado']);

		if(strlen($codigo) == 8 && $tipo != 'NA' && $estado != 'NA'){
			if(!validarPagoJuegoRapido($conexion, $codigo)){
				if(registrarPagoJuegoRapido($conexion, $codigo, 5, $estado, $tipo, $nombre)){
					if($estado == 1){
						$salida[0] = ['success', 'Exito al guardar', 'La jugada con el codigo "'.$codigo.'" ha sido guardada, la jugada fue confirmada y esta lista para jugar.'];
					} else {
						$salida[0] = ['info', 'Jugada registrada', 'La jugada con el codigo "'.$codigo.'" ha sido registrada, la jugada fue rechazada por lo cual no podra ser jugada.'];
						rechazarJugadaRapida($conexion, $codigo);
					}
				} else {
					$salida[0] = ['error', 'Error al guardar', 'Error al intentar guardar la jugada, se puede deber a problemas en la conexion o los datos ingresados no son correctos.'];
				}
			} else {
				$salida[0] = ['error', 'Error al guardar', 'Esta jugada ya ha sido registrada, por lo cual no se puede registrar dos veces.'];
			}
		} else {
			$salida[0] = ['error','Error','Los datos a registrar estan incompletos, por favor ingrese correctamente los datos e intente de nuevo.'];
		}
	} else {
		$salida[0] = ['error','Error','Los datos ingresados son erroneos.'];
	}
} else {
	$salida[0] = ['error','Error','La sesion actual no tiene los permisos sobre esta acción.'];
}

if(buscarJuegoRapido($conexion, $codigo)){
	$data = actualizarDatosJugadaRapida($conexion, $codigo);
	if($data[3] == '0000/00/00'){
		$data[3] = $data[2];
	}
	$salida[1] = [$data[0],$data[1],fecha($data[2]),fecha($data[3])];
} else {
	$salida[1] = ['Pendiente','Pendiente','--/--/--','--/--/--'];
}

echo json_encode($salida);