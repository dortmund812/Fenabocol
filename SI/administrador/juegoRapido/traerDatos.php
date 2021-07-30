<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = [['h'],['g'],['lorem']];
if(!empty($_SESSION) && $_SESSION['jugador'] == 'fenabocolorg@gmail.com'){
	if(isset($_POST['codigo'])){
		$codigo = limpiarDatos($_POST['codigo']);

		$jugada = buscarJugadaRapida($conexion, $codigo);
		$resultado = buscarResultadoJugadaRapida($conexion, $codigo);
		$pago = datosPagoCodigo($conexion, $codigo);

		if(!empty($jugada)){
			$salida[0] = [$jugada[0],$jugada[1],$jugada[2],$jugada[3],$jugada[4],$jugada[5]];
		} else {
			$salida[0] = ['-','-','-','-','-','-'];
		}

		if(!empty($resultado)){
			$salida[1] = [$resultado[0],$resultado[1],$resultado[2],$resultado[3],$resultado[4],$resultado[5]];
		} else {
			$salida[1] = ['-','-','-','-','-','-'];
		}

		if(!empty($pago)){
			$salida[2] = [$pago[0],$pago[1],$pago[2],$pago[3],fecha($pago[4])];
		} else {
			$salida[2] = ['-','-','-','-','-'];
		}
	} else {
		$salida = [['z'],['x'],['ipsum']];
	}
} else {
	$salida = [['a'],['s'],['dollor']];
}

echo json_encode($salida);