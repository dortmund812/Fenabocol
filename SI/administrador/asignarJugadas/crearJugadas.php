<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';
$str = "abcdefghijklmnopqrstuvwxyz1234567890";
if (!empty($_SESSION)) {
	if (isset($_POST['cantidad'])) {
		$cantidad = numero($_POST['cantidad']);
		for ($i=1; $i <= $cantidad; $i++) {
			$paso = false;
			while ($paso != true) {
				$codigo = "";
				for($j=0;$j<10;$j++) {
					$codigo .= substr($str,rand(0,36),1);
				}
				$codigoBool = buscarCodigo($conexion, $codigo);
				if (empty($codigoBool)) {
					$salida .= "<tr class='text-center'>
									<td>".$i."</td>
									<td>".$codigo."</td>
									<td>$1.000</td>
									<td>Confirmada</td>
								</tr>";
					$paso = true;
				}
			}
		}
	} else {
		$salida .= "<tr class='bg-danger text-white text-center'>
						<td colspan='4'>No hay Jugadas</td>
					</tr>";
	}
} else {
	$salida .= 'Error';
}

echo $salida;

?>