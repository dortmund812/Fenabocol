<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (isset($_POST['codigo'])
	&& isset($_POST['fecha'])
	&& isset($_POST['estado'])) {
	
	if (!empty($_SESSION)) {
		$codigo = limpiarDatos($_POST['codigo']);
		$fecha = limpiarDatos($_POST['fecha']);
		$estado = limpiarDatos($_POST['estado']);

		$correo = $_SESSION['jugador'];
		$jugador = traerIDCorreo($conexion, $correo);
		$jugadas = buscarJugadas($conexion, $jugador[0], $codigo, $fecha, $estado);

		if (!empty($jugadas)) {
			foreach ($jugadas as $jugada) {
				$salida .= '<tr>
								<td>'.$jugada['jugada_1'].'</td>
								<td>'.$jugada['jugada_2'].'</td>
								<td>'.$jugada['jugada_3'].'</td>
								<td>'.$jugada['jugada_4'].'</td>
								<td>'.$jugada['jugada_5'].'</td>
								<td>'.$jugada['jugada_6'].'</td>
								<td style="letter-spacing: 3px">'.$jugada['pago'].'</td>';
								if ($jugada['fechaUp'] != '0000-00-00') {
									$salida .= '<td>'.fecha($jugada['fechaUp']).'</td>';
								} else {
									$salida .= '<td>Fecha no registrada</td>';
								}
								$salida .='<td>'.$jugada['estado'].'</td>
								<td><button class="btn btn-sm btn-info text-white btnSearch" id="'.$jugada['pago'].'"><i class="icon-search2"></i></button></td>
							</tr>';
			}
		} else {
			$salida .= '<tr>
							<td colspan="10">No tienes jugadas</td>
						</tr>';
		}
	} else {
		$salida .= 'Error';
	}
} else {
	$salida .= 'Error';
}

echo $salida;
?>