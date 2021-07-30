<?php session_start();

require_once '../../config/config.php';
require_once '../../config/funciones.php';
require_once '../../config/PHPMailer-5.2-stable/PHPMailerAutoload.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}

$salida = '';

if (isset($_POST['correo'])
	&& isset($_POST['telefono'])
	&& isset($_POST['password'])) {
	
	$correo = limpiarDatos($_POST['correo']);
	$telefono = limpiarDatos($_POST['telefono']);
	$password = limpiarDatos($_POST['password']);

	$validacion = validarCorreo($correo, $conexion);

	if (empty($validacion)) {
		$password = hash('sha512', $password);
		registrarJugador($correo, $telefono, $password, $conexion);
		$_SESSION['jugador'] = $correo;
		$salida .= 'Exito';
	} else {
		$salida .= 'ErrorCorreo';
	}

} else {
	$salida .= 'Error';
}

echo $salida;

?>