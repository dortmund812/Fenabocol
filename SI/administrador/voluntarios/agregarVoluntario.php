<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida[0] = ['info','Info','Ingreso a la función.'];
if (!empty($_SESSION) && $_SESSION['jugador'] == 'fenabocolorg@gmail.com') {
	if (isset($_POST['identificacion']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['estado']) && isset($_POST['jugadas']) && isset($_POST['tipo'])) {

		$nombre = limpiarDatos($_POST['nombre']);
		$identificacion = limpiarDatos($_POST['identificacion']);
		$telefono = numero($_POST['telefono']);
		$correo = limpiarDatos($_POST['correo']);
		$estado = numero($_POST['estado']);
		$jugadas = numero($_POST['jugadas']);
		$tipo = numero($_POST['tipo']);

		if($nombre != '' && $identificacion != '' && $telefono != '' && $correo != '' && $estado != 'NA' && $jugadas >= 1 && $tipo != 'NA'){
			if(agregarDatosVoluntarios($conexion, $nombre, $identificacion, $telefono, $correo, $estado, $jugadas, $tipo)){
				$salida[0] = ['success','Exito','El usuario ha sido agregado con exito. Recuerde que la primera contraseña sera la misma identificacion, el correo y contraseña con los que ingresara son: <br><ul><li>'.$correo.'</li><li>'.$identificacion.'</li></ul>'];
				$salida[1] = traerListaVoluntarios($conexion);
			} else {
				$salida[0] = ['error','Error','El usuario no ha sido agregado, se puede deber a problemas en la conexion o los datos no han podido ser procesados.'];
			}
		} else {
				$salida[0] = ['error','Error','El usuario no ha sido agregado, Los datos a ingresar estan incompletos, por favor complete correctamente los datos e intente de nuevo.'];
		}
	} else {
		$salida[0] = ['error','Error','Los datos no han podido ser actualizados, puede ser por problemas en la conexion o que los datos estan herrados.'];
	}
} else {
	$salida[0] = ['error','Error','No tiene acceso a esta funcion.'];
}
echo json_encode($salida);