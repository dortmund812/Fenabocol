<?php session_start();
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';

$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = [['info','Titulo','Mensaje']];
$pasoguardado = false;

if (isset($_POST['jugadas'])) {
	$j1 = limpiarDatos($_POST['jugadas'][0]);
	$j2 = limpiarDatos($_POST['jugadas'][1]);
	$j3 = limpiarDatos($_POST['jugadas'][2]);
	$j4 = limpiarDatos($_POST['jugadas'][3]);
	$j5 = limpiarDatos($_POST['jugadas'][4]);
	$j6 = limpiarDatos($_POST['jugadas'][5]);
	$juego = [$j1,$j2,$j3,$j4,$j5,$j6];
	$codigo = codigoAleatorio();
	$voluntario = traerIDVoluntario($conexion, $_SESSION['usuario']);
	$datosVol = traerDatosVoluntarios($conexion, $voluntario);
	
	if (!traerEstadoVoluntario($conexion, $_SESSION['usuario'])){
		$salida[0] = ['error', 'Error', 'Su estado actual es inactivo por lo cual no puede realizar esta acción.'];
		echo json_encode($salida);
		die();
	}
	if(traerDatosVoluntarios($conexion, $voluntario)[6] < 1){
		$salida[0] = ['error', 'Error', 'Usted no cuenta con jugadas disponibles para registrar, por favor comuniquese con el administrador para que le asignen mas jugadas.'];
		$salida[1] = ["","","","","",""];
		echo json_encode($salida);
		die();
	}
	if(guardarJuegoRapido($conexion, $codigo, $j1, $j2, $j3, $j4, $j5, $j6)){
		
		if(registrarPagoJuegoRapido($conexion, $codigo, $voluntario, 1, $datosVol[8], $datosVol[1])){
			modificarJugadasCodigo($conexion, $voluntario);

			$result = validRes();
			$aciertos = 0;
			for ($i=0; $i < sizeof($juego); $i++) { 
				if($juego[$i] != $result[$i]){
					break;
				}
				$aciertos++;
			}
			if(registrarResultadosJuegoRapido($conexion, $codigo, $result[0],$result[1],$result[2],$result[3],$result[4],$result[5],$aciertos)){

				registrarResultadoJugada($conexion,$codigo,$aciertos);

				if ($aciertos == 6) {
					$salida[0] = ['success','Juego Registrado','Felicitaciones ha ganado el Bingo Fenabocol, presente el codigo: "'.$codigo.'" para recibir su premio, Muchas gracias por tu aporte.'];
				} else {
					$salida[0] = ['success','Juego Registrado','Lo sentimos, has tenido: '.$aciertos.' aciertos, por lo cual no has ganado al Bingo Fenabocol, realiza una nueva jugada para volver a participar, Muchas gracias por tu aporte.'];
				}
				$salida[1] = $result;
				$salida[2] = $aciertos;

			} else {
				$salida[0] = ['error','Error','Ocurrio un error al realizar la jugada, puede deberse a problemas de conexion o que esta jugada ya ha sido guardada jugada.'];
			}
		} else {
			$salida[0] = ['error', 'Error al guardar', 'Error al intentar guardar la jugada, se puede deber a problemas en la conexion o los datos ingresados no son correctos. lorem'];
		}
	} else {
		$salida[0] = ['error', 'Error al guardar', 'Error al intentar guardar la jugada, se puede deber a problemas en la conexion o los datos ingresados no son correctos. dollor'];
	}
	
} else {
	$salida[0] = ['error','Error','Faltan datos'];
}


function validRes(){
	$char = ['01','02','03','04','05','06','07','08','09','10','b','11','12','13','14','15','16','17','18','19','20','i','21','22','23','24','25','26','27','28','29','30','n','31','32','33','34','35','36','37','38','39','40','g','41','42','43','44','45','46','47','48','49','50','o'];
	$resultados = [];

	for ($i=0; $i < 6; $i++) { 
		$valid = false;
		while ($valid == false) {
			$pass = $char[rand(0,(sizeof($char)-1))];
			$cantidad = '';

			for($i = 0; $i < sizeof($resultados); $i++){
				if($resultados[$i] == $pass){
					$cantidad .= $pass;
				}
			}

			if($cantidad == ''){
				array_push($resultados, $pass);
				$valid = true;
			}
			
		}
	}
	return $resultados;
}

echo json_encode($salida);