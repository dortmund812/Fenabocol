<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (!empty($_SESSION)) {
	if (isset($_POST['telefono'])
		&& isset($_POST['password'])
		&& isset($_POST['password2'])) {
		
		$correo = $_SESSION['jugador'];
		$jugador = traerIDCorreo($conexion, $correo);

		$password2 = limpiarDatos($_POST['password2']);
		$password2 = hash('sha512', $password2);

		if (validarPassword($conexion, $jugador[0], $password2)) {
			$datosJugador = traerDatosJugador($conexion, $jugador[0]);
			// TELEFONO
			if ($_POST['telefono'] != '') {
				$telefono = numero($_POST['telefono']);
			} else {
				$telefono = $datosJugador[0];
			}
			// PASSWORD
			if ($_POST['password'] != '') {
				$password = limpiarDatos($_POST['password']);
				$password = hash('sha512', $password);
			} else {
				$password = $datosJugador[2];
			}
			// MODIFICAR DATOS
			modificarDatos($conexion, $telefono, $password, $jugador[0]);
			$salida .= 'Datos Actualizados Correctamente';
		} else {
			$salida .= 'Contraseña incorrecta';
		}

	} else {
		$salida .= 'Error1' . $_POST['telefono'] . '-' . $_POST['password'] . '-' . $_POST['password2'];
	}

} else {
	$salida .= 'Error2';
}

echo $salida;

?>