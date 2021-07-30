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

	$codigo = limpiarDatos($_POST['codigo']);
	$fecha = limpiarDatos($_POST['fecha']);
	$estado = limpiarDatos($_POST['estado']);

	if (!empty($_SESSION)) {
		$jugadas = traerJugadasTotal($conexion, $codigo, $fecha, $estado);

		if (!empty($jugadas)) {
			foreach ($jugadas as $jugada) {
				if ($jugada['estado'] == 2) {
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
						$salida .= '<td>
										<button class="btn btn-success disabled">Aprobada</button>
									</td>
								</tr>';
				} else if ($jugada['estado'] == 3) {
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
						$salida .= '<td>
										<button class="btn btn-warning disabled">Ganador</button>
									</td>
								</tr>';
				} else if ($jugada['estado'] == 4) {
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
						$salida .= '<td>
										<button class="btn btn-danger disabled">No Gano</button>
									</td>
								</tr>';
				} else if ($jugada['estado'] == 1) {
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
						$salida .= '<td>
										<button class="btn btn-primary btn-modificar" id="'.$jugada['id_jugada'].'">Aprobar</button>
									</td>
								</tr>';
				}
			}
		} else {
			$salida .= '<tr>
							<td colspan="9">No Hay Jugadas</td>
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