<?php 
require_once '../../config/config.php';
require_once '../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = ['info','',''];

if (isset($_POST['jugadas'])&&isset($_POST['codigo'])) {
	$codigo = limpiarDatos($_POST['codigo']);
	$j1 = limpiarDatos($_POST['jugadas'][0]);
	$j2 = limpiarDatos($_POST['jugadas'][1]);
	$j3 = limpiarDatos($_POST['jugadas'][2]);
	$j4 = limpiarDatos($_POST['jugadas'][3]);
	$j5 = limpiarDatos($_POST['jugadas'][4]);
	$j6 = limpiarDatos($_POST['jugadas'][5]);

	if(strlen($codigo) == 8){
		if(empty(buscarJuegoRapido($conexion, $codigo))){
			if(guardarJuegoRapido($conexion,$codigo,$j1,$j2,$j3,$j4,$j5,$j6)){
				$salida[0] = 'success';
				$salida[1] = 'Jugada registrada';
				$salida[2] = 'Jugada registrada con exito, guarde este codigo: "'.$codigo.'" para realizar su jugada cuando se registre el pago.';
			} else {
				$salida[0] = 'error';
				$salida[1] = 'Error al guardar';
				$salida[2] = 'Ocurrio un error al guardar la jugada, puede deberse a problemas de conexion o que esta jugada ya ha sido registrada.';
			}
		} else {
			if(modificarJuegoRapido($conexion,$codigo,$j1,$j2,$j3,$j4,$j5,$j6)){
				$salida[0] = 'success';
				$salida[1] = 'Jugada Modificar';
				$salida[2] = 'La jugada ha sido modificada con exito, guarde este codigo: "'.$codigo.'" para realizar su jugada cuando se registre el pago.';
			} else {
				$salida[0] = 'error';
				$salida[1] = 'Error al Modificar';
				$salida[2] = 'Ocurrio un error al modificar la jugada, puede deberse a problemas de conexion, los datos de la jugada no han cambiado o que esta jugada ya ha sido guardada y aprobada.';
			}
		}
	} else {
		$salida[0] = 'error';
		$salida[1] = 'Error de codigo';
		$salida[2] = 'El cogido registrado no cumple con los parametros, ingrese un codigo valido.';
	}
} else {
	$salida[0] = 'error';
	$salida[1] = 'Error de Datos';
	$salida[2] = 'Los datos datos ingresados son erroneos, complete los datos correctamente e intente de nuevo.';
}

echo json_encode($salida);