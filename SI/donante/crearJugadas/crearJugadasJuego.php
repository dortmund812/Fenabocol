<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = [
	array('0' => "",'1' => "",'2' => "",'3' => "",'codigo' => "",'estado' => "",'fechaCrea' => "",'nombreCliente' => "")
];

if (!empty($_SESSION) && $_SESSION['rol'] == 'donante') {
	if (isset($_POST['cantidad']) && isset($_POST['nombre'])) {
		$cantidad = numero($_POST['cantidad']);
		$nombre = limpiarDatos($_POST['nombre']);
		$voluntario = traerIDVoluntario($conexion, $_SESSION['usuario']);
		$datVolunt = traerDatosVoluntarios($conexion, $voluntario);

		if (!traerEstadoVoluntario($conexion, $_SESSION['usuario'])){
			$salida = [array('0' => "Error, usted se encuentra bloqueado.",'1' => "",'2' => "",'3' => "Porfavor comuniquese con el administrador.",'codigo' => "Error, usted se encuentra bloqueado.",'estado' => "",'fechaCrea' => "",'nombreCliente' => "Porfavor comuniquese con el administrador.")];
			print json_encode($salida, JSON_UNESCAPED_UNICODE);
			die();
		}
		if($datVolunt[6] < 1){
			$salida = [array('0' => "Error, usted no cuenta con jugadas disponibles.",'1' => "",'2' => "",'3' => "Porfavor comuniquese con el administrador.",'codigo' => "Error, usted no cuenta con jugadas disponibles.",'estado' => "",'fechaCrea' => "",'nombreCliente' => "Porfavor comuniquese con el administrador.")];
			print json_encode($salida, JSON_UNESCAPED_UNICODE);
			die();
		}
		if($cantidad > 0 && $datVolunt[6] < $cantidad){
			$salida = [array('0' => "Error usted solo cuenta con: ".$datVolunt[6]." jugadas.",'1' => "",'2' => "",'3' => "Porfavor comuniquese con el administrador.",'codigo' => "Error usted solo cuenta con: ".$datVolunt[6]." jugadas.",'estado' => "",'fechaCrea' => "",'nombreCliente' => "Porfavor comuniquese con el administrador.")];
			print json_encode($salida, JSON_UNESCAPED_UNICODE);
			die();
		}


		$salida = [];
		$jugadas = '';
		for($i = 0; $i < $cantidad; $i++){
			$paso = false;
			while ($paso != true) {
				$cod = codigoAleatorio();
				if(!validarCodigoPago($conexion, $cod)){
					$paso = true;
					array_push($salida, array('0' => $cod,
											'1' => "Confirmada",
											'2' => fecha(date('Y-m-d')),
											'3' => $nombre,
											'codigo' => $cod,
											'estado' => "Confirmada",
											'fechaCrea' => fecha(date('Y-m-d')),
											'nombreCliente' => $nombre));
					$jugadas .= "('".$cod."', ".$voluntario.", 1, 2, '".$nombre."')";
				}
			}
			if($i == ($cantidad - 1)){break;}
			$jugadas .= ',';
		}
		registrarPagosDonante($conexion, $jugadas);
		modificarJugadasDonante($conexion, $voluntario, $cantidad);
	}
}

print json_encode($salida, JSON_UNESCAPED_UNICODE);