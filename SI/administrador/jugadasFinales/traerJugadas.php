<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';
$jugadas = traerJugadaFinalAdmin($conexion);
if (!empty($jugadas)) {
	foreach ($jugadas as $jugada) {
		$salida .= "<tr class='text-center'>
						<td>".$jugada[0]."</td>
						<td>".$jugada[1]."</td>
						<td>".$jugada[2]."</td>
						<td>".$jugada[3]."</td>
						<td>".$jugada[4]."</td>
						<td>".$jugada[5]."</td>
						<td>".$jugada[6]."</td>";

						if ($jugada[7] != '0000-00-00') {
							$salida .= '<td>'.fecha($jugada[7]).'</td>';
						} else {
							$salida .= '<td>Fecha no registrada</td>';
						}
						$salida .= "
						<td>".$jugada[8]."</td>
					</tr>";
	}
} else {
	$salida .= "<tr class='text-center'>
					<td colspan='8'>No hay Jugadas</td>
				</tr>";
}

echo $salida;

?>