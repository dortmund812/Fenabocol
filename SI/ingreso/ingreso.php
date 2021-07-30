<?php session_start();
require_once '../../config/config.php';
require_once '../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';

if (isset($_POST['correo']) && isset($_POST['password'])) {
	$correo = limpiarDatos($_POST['correo']);
	$password = limpiarDatos($_POST['password']);
	$password = hash('sha512', $password);

	$jugador = validarIngreso($correo, $password, $conexion);
	if (!empty($jugador)) {
		$usuario = $jugador['correo'];
		$_SESSION['jugador'] = $usuario;
		$salida = 'Exito';
	} else {
		if(!empty(buscarVoluntario($conexion, $correo, $password))){
			$rol = rolVoluntarioIngreso($conexion, $correo);
			$rol = strtolower($rol);

			$_SESSION['usuario'] = $correo;
			$_SESSION['jugador'] = 'NA';
			$_SESSION['rol'] = $rol;
			$salida = 'Exito';

		} else {
			$_SESSION = array();
			$salida = 'Error 2';
		}
	}

} else {
	$salida = 'Error 1';
}

echo $salida;

?>