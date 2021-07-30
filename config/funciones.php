<?php 
require_once 'config.php';
// CONEXION A LA BASE DE DATOS
function conexion($base_datos){
	try {
		$conexion = new PDO('mysql:host=localhost;dbname='.$base_datos['basedatos'],$base_datos['usuario'],$base_datos['password']);
		$conexion->exec("SET NAMES utf8");
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}
// LIMPIAR LOS DATOS INGRESADOS
function limpiarDatos($datos){
	$datos = trim($datos);
	$datos = stripcslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}
// OBTENER UN NUMERO ENTERO
function numero($id){
	return (int)limpiarDatos($id);
}
// VALIDAR INGRESO
function validarIngreso($correo, $password, $conexion){
	$statement = $conexion->prepare('SELECT jugador.correo, jugador.password 
		FROM jugador WHERE jugador.correo = :correo AND jugador.password = :password');

	$statement->execute(array(':correo' => $correo, ':password' => $password));
	$resultado = $statement->fetch();

	return $resultado;
}
function validarCorreo($correo, $conexion){
	$statement = $conexion->prepare('SELECT jugador.correo FROM jugador WHERE jugador.correo = :correo');
	$statement->execute(array(':correo' => $correo));
	$resultado = $statement->fetch();

	return $resultado;
}
// REGISTRAR JUGADOR
function registrarJugador($correo, $telefono, $password, $conexion){
	$statement = $conexion->prepare('INSERT INTO jugador VALUES (null, :correo, :telefono, :password)');
	$statement->execute(array(':correo' => $correo, ':telefono' => $telefono, ':password' => $password));
}
// TRAER ID POR CORREO
function traerIDCorreo($conexion, $correo){
	$statement = $conexion->prepare('SELECT jugador.id_jugador FROM jugador WHERE jugador.correo = :correo');
	$statement->execute(array(':correo' => $correo));
	$resultado = $statement->fetch();
	return $resultado;
}
// REGISTAR JUGADA 
function registrarJugada($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6, $idfila, $jugador, $fechaUp){
	$statement = $conexion->prepare('INSERT INTO jugada (jugador,pago,jugada_1,jugada_2,jugada_3,jugada_4,jugada_5,jugada_6,fechaUp) VALUES (:jugador,:pago,:jugada_1,:jugada_2,:jugada_3,:jugada_4,:jugada_5,:jugada_6,:fechaUp)');
	$statement->execute(array(':jugador' => $jugador, ':pago' => $idfila, ':jugada_1' => $jugada_1, ':jugada_2' => $jugada_2, ':jugada_3' => $jugada_3, ':jugada_4' => $jugada_4, ':jugada_5' => $jugada_5, ':jugada_6' => $jugada_6, ':fechaUp' => $fechaUp));
}
// REGISTARR JUGADA ASIGNADA
function modificarJugadaAsignada($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6, $idfila, $jugador, $fechaUp){
	$statement = $conexion->prepare('UPDATE jugada SET jugador = :jugador, jugada_1 = :jugada_1, jugada_2 = :jugada_2, jugada_3 = :jugada_3, jugada_4 = :jugada_4, jugada_5 = :jugada_5, jugada_6 = :jugada_6, fechaUp = :fechaUp WHERE pago = :pago');
	$statement->execute(array(':jugador' => $jugador, ':pago' => $idfila, ':jugada_1' => $jugada_1, ':jugada_2' => $jugada_2, ':jugada_3' => $jugada_3, ':jugada_4' => $jugada_4, ':jugada_5' => $jugada_5, ':jugada_6' => $jugada_6, ':fechaUp' => $fechaUp));
}
// REGISTAR JUGADA ASIGNADA
function registrarJugadaAsignada($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6, $idfila, $jugador){
	$statement = $conexion->prepare("INSERT INTO jugada (jugador,pago,estado,jugada_1,jugada_2,jugada_3,jugada_4,jugada_5,jugada_6) VALUES (:jugador,:pago,'2',:jugada_1,:jugada_2,:jugada_3,:jugada_4,:jugada_5,:jugada_6)");
	$statement->execute(array(':jugador' => $jugador, ':pago' => $idfila, ':jugada_1' => $jugada_1, ':jugada_2' => $jugada_2, ':jugada_3' => $jugada_3, ':jugada_4' => $jugada_4, ':jugada_5' => $jugada_5, ':jugada_6' => $jugada_6));
}
// BUSCAR CODIGO
function buscarCodigo($conexion, $codigo){
	$statement = $conexion->prepare('SELECT jugada.pago FROM jugada WHERE jugada.pago = :codigo');
	$statement->execute(array(':codigo' => $codigo));
	$resultado = $statement->fetch();
	return $resultado;
}
// BUSCAR CODIGO ASIGNADO
function buscarCodigoAsignado($conexion, $codigo){
	$statement = $conexion->prepare('SELECT * FROM jugada WHERE jugada.pago = :codigo');
	$statement->execute(array(':codigo' => $codigo));
	$resultado = $statement->fetch();
	return $resultado;
}
// BUSCAR JUGADAS
function buscarJugadas($conexion, $id, $codigo, $fecha, $estado){
	$statement = $conexion->prepare("SELECT jugada.id_jugada, jugada.jugada_1, jugada.jugada_2, jugada.jugada_3, jugada.jugada_4, jugada.jugada_5, jugada.jugada_6, jugada.pago, jugada.fechaUp, estado_jugada.estado, jugada.id_jugada FROM jugada 
		INNER JOIN estado_jugada ON jugada.estado = estado_jugada.id_estado
		WHERE jugada.jugador = :idJugador
			AND jugada.pago LIKE :codigo
			AND jugada.fechaUp LIKE :fecha
			AND jugada.estado LIKE :estado
		ORDER BY jugada.fechaUp DESC
		LIMIT 100");
	$statement->execute(array(
		':idJugador' => $id, 
		':codigo' => "%$codigo%", 
		':fecha' => "%$fecha%", 
		':estado' => "%$estado%"
		));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// TRAER JUGADAS TOTAL
function traerJugadasTotal($conexion, $codigo, $fecha, $estado){
	$statement = $conexion->prepare('SELECT * FROM jugada 
		WHERE jugada.pago LIKE :codigo 
		AND jugada.jugada_1 <> ""
		AND jugada.fechaUp LIKE :fecha
		AND jugada.estado LIKE :estado 
		ORDER BY jugada.fechaUp DESC LIMIT 100');
	$statement->execute(array(
		':codigo' => "%$codigo%",
		':fecha' => "%$fecha%",
		':estado' => "%$estado%"
	));
	$resultado = $statement->fetchAll();
	return $resultado;
}
// JUARDAR JUGADA FINAL
function registrarJugadaFinal($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6, $fecha, $ganadores){
	$statement = $conexion->prepare('INSERT INTO jugada_final (jugada_1, jugada_2, jugada_3, jugada_4, jugada_5, jugada_6, fecha, ganadores) VALUES (:jugada_1, :jugada_2, :jugada_3, :jugada_4, :jugada_5, :jugada_6, :fecha, :ganadores)');
	$statement->execute(array(':jugada_1' => $jugada_1, ':jugada_2' => $jugada_2, ':jugada_3' => $jugada_3, 'jugada_4' => $jugada_4, ':jugada_5' => $jugada_5, ':jugada_6' => $jugada_6, ':fecha' => $fecha, ':ganadores' => $ganadores));
}
// TRAER ULTIMA JUGADA FINAL
function traerJugadaFinal($conexion){
	$statement = $conexion->prepare('SELECT * FROM jugada_final ORDER BY jugada_final.id_jugada_final Desc LIMIT 1');
	$statement->execute();
	$resultado = $statement->fetch();
	return $resultado;
}
// TRAER JUGADA FINAL ADMIN
function traerJugadaFinalAdmin($conexion){
	$statement = $conexion->prepare('SELECT * FROM jugada_final ORDER BY jugada_final.id_jugada_final Desc LIMIT 20');
	$statement->execute();
	$resultado = $statement->fetchAll();
	return $resultado;
}
// REGISTAR GANADORES
function registrarGanador($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6, $fecha){
	$statement = $conexion->prepare("UPDATE jugada SET jugada.estado = '3', jugada.fechaGame = :fecha WHERE jugada_1 = :jugada_1 AND jugada_2 = :jugada_2 AND jugada_3 = :jugada_3 AND jugada_4 = :jugada_4 AND jugada_5 = :jugada_5 AND jugada_6 = :jugada_6 AND jugada.estado = '2'");
	$statement->execute(array(':jugada_1' => $jugada_1, ':jugada_2' => $jugada_2, ':jugada_3' => $jugada_3, 'jugada_4' => $jugada_4, ':jugada_5' => $jugada_5, ':jugada_6' => $jugada_6, ':fecha' => $fecha));
}
function registrarPerdedores($conexion, $fecha){
	$statement = $conexion->prepare("UPDATE jugada SET jugada.estado = '4', jugada.fechaGame = :fecha WHERE jugada.estado = '2' AND jugada.jugada_1 <> ''");
	$statement->execute(array(':fecha' => $fecha));
}
// BUSCAR PRIMER PUESTO
function buscarPrimerPuesto($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6){
	$statement = $conexion->prepare("SELECT COUNT(*) AS primerPuesto FROM jugada WHERE jugada_1 = :jugada_1 AND jugada_2 = :jugada_2 AND jugada_3 = :jugada_3 AND jugada_4 = :jugada_4 AND jugada_5 = :jugada_5 AND jugada_6 = :jugada_6 AND jugada.estado = '2'");

	$statement->execute(array(':jugada_1' => $jugada_1, ':jugada_2' => $jugada_2, ':jugada_3' => $jugada_3, 'jugada_4' => $jugada_4, ':jugada_5' => $jugada_5, ':jugada_6' => $jugada_6));
	$resultado = $statement->fetch();
	return $resultado;
}
// BUSCAR SEGUNDO PUESTO
function buscarSegundoPuesto($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6){
	$statement = $conexion->prepare("SELECT COUNT(*) AS primerPuesto FROM jugada WHERE jugada_1 = :jugada_1 AND jugada_2 = :jugada_2 AND jugada_3 = :jugada_3 AND jugada_4 = :jugada_4 AND jugada_5 = :jugada_5 AND jugada_6 <> :jugada_6 AND jugada.estado = '2'");

	$statement->execute(array(':jugada_1' => $jugada_1, ':jugada_2' => $jugada_2, ':jugada_3' => $jugada_3, 'jugada_4' => $jugada_4, ':jugada_5' => $jugada_5, ':jugada_6' => $jugada_6));
	$resultado = $statement->fetch();
	return $resultado;
}
// BUSCAR TERCER PUESTO
function buscarTercerPuesto($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6){
	$statement = $conexion->prepare("SELECT COUNT(*) AS primerPuesto FROM jugada WHERE jugada_1 = :jugada_1 AND jugada_2 = :jugada_2 AND jugada_3 = :jugada_3 AND jugada_4 = :jugada_4 AND jugada_5 <> :jugada_5 AND jugada_6 <> :jugada_6 AND jugada.estado = '2'");

	$statement->execute(array(':jugada_1' => $jugada_1, ':jugada_2' => $jugada_2, ':jugada_3' => $jugada_3, 'jugada_4' => $jugada_4, ':jugada_5' => $jugada_5, ':jugada_6' => $jugada_6));
	$resultado = $statement->fetch();
	return $resultado;
}
// BUSCAR CUARTO PUESTO
function buscarCuartoPuesto($conexion, $jugada_1, $jugada_2, $jugada_3, $jugada_4, $jugada_5, $jugada_6){
	$statement = $conexion->prepare("SELECT COUNT(*) AS primerPuesto FROM jugada WHERE jugada_1 = :jugada_1 AND jugada_2 = :jugada_2 AND jugada_3 = :jugada_3 AND jugada_4 <> :jugada_4 AND jugada_5 <> :jugada_5 AND jugada_6 <> :jugada_6 AND jugada.estado = '2'");

	$statement->execute(array(':jugada_1' => $jugada_1, ':jugada_2' => $jugada_2, ':jugada_3' => $jugada_3, 'jugada_4' => $jugada_4, ':jugada_5' => $jugada_5, ':jugada_6' => $jugada_6));
	$resultado = $statement->fetch();
	return $resultado;
}
// REGISTAR LIMITE JUGADA
function registrarLimiteJugada($conexion, $limite){
	$statement = $conexion->prepare('INSERT INTO jugada_final (limite) VALUES (:limite)');
	$statement->execute(array(':limite' => $limite));
}
// MODIFICAR LIMITE JUGADA
function modificarLimiteJuegada($conexion, $limite, $id){
	$statement = $conexion->prepare('UPDATE jugada_final SET limite = :limite WHERE id_jugada_final = :id');
	$statement->execute(array(':limite' => $limite, ':id' => $id));
}
// CONFIRMAR JUGADA
function confirmarJugada($conexion, $jugada){
	$statement = $conexion->prepare("UPDATE jugada SET jugada.estado = '2' WHERE jugada.id_jugada = :jugada");
	$statement->execute(array(':jugada' => $jugada));
}
// OBTENER DATOS DE JUGADA
function obtenerJugada($conexion, $jugada){
	$statement = $conexion->prepare("SELECT jugada.jugada_1, jugada.jugada_2, jugada.jugada_3, jugada.jugada_4, jugada.jugada_5, jugada.jugada_6, jugada.pago, jugada.fechaUp, estado_jugada.estado FROM jugada
		INNER JOIN estado_jugada ON jugada.estado = estado_jugada.id_estado
		WHERE jugada.pago = :jugada");
	$statement->execute(array(':jugada' => $jugada));
	$resultado = $statement->fetch();
	return $resultado;
}
// TRAER DATOS JUGADOR
function traerDatosJugador($conexion, $id){
	$statement = $conexion->prepare("SELECT jugador.telefono, jugador.correo, jugador.password FROM jugador WHERE jugador.id_jugador = :jugador");
	$statement->execute(array(':jugador' => $id));
	$resultado = $statement->fetch();
	return $resultado;
}
// MODIFICAR DATOS BASICOS
function modificarDatos($conexion, $telefono, $password, $jugador){
	$statement = $conexion->prepare("UPDATE jugador SET telefono = :telefono, password = :password WHERE jugador.id_jugador = :jugador");
	$statement->execute(array(':telefono' => $telefono, ':password' => $password, ':jugador' => $jugador));
}
// VALIDAR PASSWORD
function validarPassword($conexion, $jugador, $password){
	$statement = $conexion->prepare("SELECT password FROM jugador WHERE id_jugador = :jugador");
	$statement->execute(array(':jugador' => $jugador));
	$resultado = $statement->fetch();
	$password2 = $resultado[0];
	if ($password == $password2) {
		return true;
	} else {
		return false;
	}
}
// FECHA
function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
	$dia = date('d', $timestamp);
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . '/' . $meses[$mes] . '/' . $year;

	return $fecha;
}













// BUSCAR JUGADA GUARDADA JUGADA JUEGO RAPIDO
function buscarJuegoRapido($conexion, $codigo){
	$statement = $conexion->prepare("SELECT COUNT(*) FROM juegorapido WHERE codigo =:codigo");
	$statement->execute(array(':codigo'=>$codigo));
	return $statement->fetch()[0];
}
// GUARDAR JUGADA JUEGO RAPIDO
function guardarJuegoRapido($conexion, $codigo, $jugada1, $jugada2, $jugada3, $jugada4, $jugada5, $jugada6){
	$statement = $conexion->prepare("INSERT INTO juegorapido (codigo,jugada1,jugada2,jugada3,jugada4,jugada5,jugada6) VALUES (:codigo,:jugada1,:jugada2,:jugada3,:jugada4,:jugada5,:jugada6)");
	return $statement->execute(array(':codigo'=>$codigo,':jugada1'=>$jugada1,':jugada2'=>$jugada2,':jugada3'=>$jugada3,':jugada4'=>$jugada4,':jugada5'=>$jugada5,':jugada6'=>$jugada6));
}
function modificarJuegoRapido($conexion, $codigo, $jugada1, $jugada2, $jugada3, $jugada4, $jugada5, $jugada6){
	$statement = $conexion->prepare("UPDATE juegorapido 
		SET jugada1 = :jugada1,
			jugada2 = :jugada2,
			jugada3 = :jugada3,
			jugada4 = :jugada4,
			jugada5 = :jugada5,
			jugada6 = :jugada6
		WHERE codigo = :codigo AND estado = 1");
	$statement->execute(array(':codigo'=>$codigo,':jugada1'=>$jugada1,':jugada2'=>$jugada2,':jugada3'=>$jugada3,':jugada4'=>$jugada4,':jugada5'=>$jugada5,':jugada6'=>$jugada6));
	return $statement->rowCount();
}
// BUSCAR JUGADA JUEGO RAPIDO
function buscarJugadaRapida($conexion, $codigo){
	$statement = $conexion->prepare("SELECT jugada1, jugada2, jugada3, jugada4, jugada5, jugada6 FROM juegorapido WHERE codigo = :codigo");
	$statement->execute(array(':codigo'=>$codigo));
	return $statement->fetch();
}
// BUSCAR JUGADA JUEGO RAPIDO
function buscarResultadoJugadaRapida($conexion, $codigo){
	$statement = $conexion->prepare("SELECT resultado1, resultado2, resultado3, resultado4, resultado5, resultado6 FROM resultadojuegorapido WHERE codigo = :codigo");
	$statement->execute(array(':codigo'=>$codigo));
	return $statement->fetch();
}
// VALIDAR PAGO
function validarPagoJuegoRapido($conexion, $codigo){
	$statement = $conexion->prepare("SELECT COUNT(*) FROM pagos WHERE codigo = :codigo AND estado = 1");
	$statement->execute(array(':codigo'=>$codigo));
	return $statement->fetch()[0];
}
// GUARDAR RESULTADOS JUGADOR
function registrarResultadosJuegoRapido($conexion,$codigo,$r1,$r2,$r3,$r4,$r5,$r6,$aciertos){
	$statement = $conexion->prepare("INSERT INTO resultadojuegorapido (codigo,resultado1,resultado2,resultado3,resultado4,resultado5,resultado6,aciertos) VALUES (:codigo,:r1,:r2,:r3,:r4,:r5,:r6,:aciertos)");
	if(modificarCambioJuegoRapido($conexion, $codigo)){
		return $statement->execute(array(':codigo'=>$codigo,':r1'=>$r1,':r2'=>$r2,':r3'=>$r3,':r4'=>$r4,':r5'=>$r5,':r6'=>$r6,':aciertos'=>$aciertos));
	}
}
// REGISTAR CAMBIO 
function modificarCambioJuegoRapido($conexion, $codigo){
	$statement = $conexion->prepare("UPDATE juegorapido a SET a.estado = 2 WHERE a.codigo = :codigo");
	$statement->execute(array(":codigo"=>$codigo));
	return $statement->rowCount();
}
// ACTUALIZAR DATOS JUGADA RAPIDA
function actualizarDatosJugadaRapida($conexion,$codigo){
	$statement = $conexion->prepare("SELECT b.estado, 
		IFNULL(
			CASE WHEN c.estado = 1 
				THEN 'Confirmada' 
			WHEN c.estado = 2 
				THEN 'Rechazada' 
			END 
		, 'En espera') AS estadoPago,
		a.fechacrea,
		IFNULL(d.fechacrea,'0000/00/00') AS fechaJuego
	FROM juegorapido a 
	LEFT JOIN estado_jugada b ON a.estado = b.id_estado 
	LEFT JOIN pagos c ON a.codigo = c.codigo
	LEFT JOIN resultadojuegorapido d ON a.codigo = d.codigo
	WHERE a.codigo = :codigo");
	$statement->execute(array(':codigo'=>$codigo));
	return $statement->fetch();
}
// BUSCAR VOLUNTARIO
function buscarVoluntario($conexion, $correo, $password){
	$statement = $conexion->prepare('SELECT a.correo, a.password 
		FROM voluntario a WHERE a.correo = :correo AND a.password = :password');
	$statement->execute(array(':correo' => $correo, ':password' => $password));
	return $statement->fetch();
}
// TARER TIPO REGISTRO JUGADA
function traerTipoRegistroJugada($conexion){
	$statement = $conexion->prepare("SELECT id, tipo FROM tipoCliente");
	$statement->execute();
	$tipos = $statement->fetchAll();
	$salida = '<option value="NA" disabled="true" readonly="true" selected="true">Seleccionar</option>';
	foreach ($tipos as $value) {
		$salida.='<option value="'.$value[0].'">'.$value[1].'</option>';
	}
	return $salida;
}
// REGISTRAR PAGO 
function registrarPagoJuegoRapido($conexion, $codigo, $voluntario, $estado, $tipo, $nombre){
	$statement = $conexion->prepare("INSERT INTO pagos (codigo, voluntario, estado, tipoCliente, nombreCliente) VALUES (:codigo, :voluntario, :estado, :tipo, :nombre)");
	return $statement->execute(array(':codigo'=>$codigo,':voluntario'=>$voluntario,':estado'=>$estado,':tipo'=>$tipo,':nombre'=>$nombre));
}
// TARER ID VOLUNTARIO
function traerIDVoluntario($conexion, $correo){
	$statement = $conexion->prepare("SELECT id FROM voluntario WHERE correo = :correo");
	$statement->execute(array(':correo'=>$correo));
	return $statement->fetch()[0];
}
// REGISTAR RESULTADO JUGADA
function registrarResultadoJugada($conexion, $codigo, $aciertos){
	$newEst = 4;
	if($aciertos == 6){
		$newEst = 3;
	}
	$statement = $conexion->prepare("UPDATE juegorapido a SET a.estado = :estado WHERE a.codigo = :codigo");
	$statement->execute(array(":codigo"=>$codigo,':estado'=>$newEst));
	return $statement->rowCount();
}
// RECHAZAR JUGADA
function rechazarJugadaRapida($conexion, $codigo){
	$statement = $conexion->prepare("UPDATE juegorapido a SET a.estado = 5 WHERE a.codigo = :codigo");
	$statement->execute(array(":codigo"=>$codigo));
	return $statement->rowCount();
}


// TRAER ESTADO VOLUNTARIO
function traerEstadoVoluntario($conexion, $correo){
	$statement = $conexion->prepare("SELECT estado FROM voluntario WHERE correo = :correo");
	$statement->execute(array(':correo' => $correo));
	return $statement->fetch()[0];
}
// VALIDAR PASSWORD
function validarPasswordVoluntario($conexion, $jugador, $password){
	$statement = $conexion->prepare("SELECT password FROM voluntario WHERE id = :jugador");
	$statement->execute(array(':jugador' => $jugador));
	$resultado = $statement->fetch();
	$password2 = $resultado[0];
	if ($password == $password2) {
		return true;
	} else {
		return false;
	}
}
// MODIFICAR DATOS VOLUNTARIO CONFIG
function modificarDatosVoluntariosConfig($conexion, $id, $telefono, $password){
	$statement = $conexion->prepare("UPDATE voluntario SET telefono = :telefono, password = :password WHERE id = :id");
	return $statement->execute(array(
		':id' => $id,
		':telefono' => $telefono, 
		':password' => $password,)
	);
}
// LISTAR JUGADAS RAPIDAS
function listarJuegoRapido($conexion){
	$statement = $conexion->prepare("SELECT a.*, b.estado, IFNULL(c.aciertos, 0) FROM juegorapido a 
	JOIN estado_jugada b ON a.estado = b.id_estado LEFT JOIN resultadojuegorapido c ON a.codigo = c.codigo");
	$statement->execute();
	return $statement->fetchAll();
}
// DATOS PAGO
function datosPagoCodigo($conexion, $codigo){
	$statement = $conexion->prepare("SELECT b.nombre, c.tipo, a.nombreCliente, CASE WHEN a.estado = 1 THEN 'Confirmada' ELSE 'Rechazada' END, a.fechaCrea FROM pagos a LEFT JOIN voluntario b ON a.voluntario = b.id LEFT JOIN tipocliente c ON a.tipoCliente = c.id WHERE a.codigo = :codigo");
	$statement->execute(array(':codigo' => $codigo));
	return $statement->fetch();
}


















// TARER LISTA VOLUNTARIOS
function traerListaVoluntarios($conexion){
	$statement = $conexion->prepare("SELECT a.id, a.nombre, a.identificacion, a.telefono, a.correo, a.estado, a.jugadas, b.tipo FROM voluntario a JOIN tipocliente b ON a.tipo = b.id");
	$statement->execute();
	$voluntarios = $statement->fetchAll();
	$salida = '';
	foreach ($voluntarios as $value) {
		$estado = $value[5] == 0 ? "Inactivo" : "Activo";
		$salida .= '<div class="col-12 col-sm-6 col-md-4">
						<div class="card">
							<div class="card-header">'.$value[1].' - '.$value[7].'</div>
							<div class="card-body">
								<ul>
									<li>Identificación: <span>'.$value[2].'</span></li>
									<li>Telefono: <span>'.$value[3].'</span></li>
									<li>Correo: <span>'.$value[4].'</span></li>
									<li>Estado: <span>'.$estado.'</span></li>
									<li>Jugadas: <span>'.$value[6].'</span></li>
								</ul>
								<button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btnVerMas" id="'.$value[0].'">Ver más</button>
							</div>
						</div>
					</div>';
	}
	return $salida;
}
// // MODIFICAR VOLUNTARIO
function modificarDatosVoluntarios($conexion, $id, $nombre, $identificacion, $telefono, $correo, $estado, $jugadas, $tipo){
	$statement = $conexion->prepare("UPDATE voluntario SET nombre = :nombre, identificacion = :identificacion, telefono = :telefono, correo = :correo, estado = :estado, jugadas = :jugadas, tipo = :tipo WHERE id = :id");
	return $statement->execute(array(':id' => $id, 
		':nombre' => $nombre, 
		':identificacion' => $identificacion, 
		':telefono' => $telefono, 
		':correo' => $correo, 
		':estado' => $estado, 
		':jugadas' => $jugadas,
		':tipo' => $tipo)
	);
}
// AGREGAR VOLUNTARIO
function agregarDatosVoluntarios($conexion, $nombre, $identificacion, $telefono, $correo, $estado, $jugadas, $tipo){
	$statement = $conexion->prepare("INSERT INTO voluntario (nombre,identificacion,telefono,correo,password,estado,jugadas,tipo) VALUES (:nombre, :identificacion, :telefono, :correo, :password, :estado, :jugadas, :tipo)");
	return $statement->execute(array(
		':nombre' => $nombre, 
		':identificacion' => $identificacion, 
		':telefono' => $telefono, 
		':correo' => $correo, 
		':estado' => $estado, 
		':jugadas' => $jugadas,
		':tipo' => $tipo,
		':password' => hash('sha512', $identificacion)
		)
	);
}
// TRAER VOLUNTARIO
function traerDatosVoluntarios($conexion, $id){
	$statement = $conexion->prepare("SELECT id, nombre, identificacion, telefono, correo, estado, jugadas, password, tipo FROM voluntario WHERE id = :id");
	$statement->execute(array(':id' => $id));
	return $statement->fetch();
}
// CREAR CODIGO ALEATORIO
function codigoAleatorio(){
	$key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < 15;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
}
// DESCONTAR JUGADAS VOLUNTARIO
function modificarJugadasCodigo($conexion, $id){
	$statement = $conexion->prepare("UPDATE voluntario SET jugadas = (jugadas - 1) WHERE id = :id");
	return $statement->execute(array(':id' => $id));
}
// ROL DE INGRESO
function rolVoluntarioIngreso($conexion, $correo){
	$statement = $conexion->prepare('SELECT b.tipo FROM voluntario a JOIN tipocliente b ON a.tipo = b.id WHERE a.correo = :correo');
	$statement->execute(array(':correo' => $correo));
	return $statement->fetch()[0];
}







// ROL DE INGRESO
function traerJugadasDonante($conexion, $id){
	$statement = $conexion->prepare("SELECT a.codigo, a.nombreCliente, 
	CASE WHEN ISNULL(b.aciertos) THEN 'Confirmada'
				ELSE CASE WHEN b.aciertos = 6 THEN 'GANO' ELSE 'No Gano' END
			END AS estado, 
			a.fechaCrea 
		FROM pagos a 
			LEFT JOIN resultadojuegorapido b ON a.codigo = b.id
		WHERE a.voluntario = :voluntario");
	$statement->execute(array(':voluntario' => $id));
	return $statement->fetchAll();
}
// REGISTAR PAGOS DONANTE
function registrarPagosDonante($conexion, $jugadas){
	$statement = $conexion->prepare('INSERT INTO pagos (codigo, voluntario, estado, tipocliente, nombrecliente) VALUES '. $jugadas);
	$statement->execute();
	return $statement->rowCount();
}
function validarCodigoPago($conexion, $codigo){
	$statement = $conexion->prepare("SELECT COUNT(*) FROM pagos WHERE codigo = :codigo");
	$statement->execute(array(':codigo'=>$codigo));
	return $statement->fetch()[0];
}
// DESCONTAR JUGADAS VOLUNTARIO
function modificarJugadasDonante($conexion, $id, $cant){
	$statement = $conexion->prepare("UPDATE voluntario SET jugadas = (jugadas - :cant) WHERE id = :id");
	return $statement->execute(array(':id' => $id, ':cant' => $cant));
}
?>