
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/Icomoon/style.css">
	<link rel="stylesheet" href="../../../css/SI/estilos-principal.css">
	<title>Registrar Jugadas</title>
</head>
<body>
	<style>
		.jugada-digito{
			border: 1px solid;
		}
		.casilla-jugada{
			border: none;
			background: none;
			outline: none;
			text-align: center;
		}
		.casilla-verificada{
			background: #CBFAF6;
		}
	</style>
	<div class="container-fluid pb-3">
		<div class="row">
			<div class="col-12">
				<div class="card p-2 my-3 contenedor-info">
					<h1 class="card-title text-center titulo-exterior">Crear Juego</h1>
				</div>
			</div>
			<div class="col-12">
				<div class="row">
					<!-- CREAR JUGADAS -->
					<div class="col-12 col-md-8">
						<div class="row">
							<!-- CREAR JUGADA AUTOMATICA -->
							<div class="col-12">
								<div class="card p-2 contenedor-info">
									<div class="card-title">
										<h2 class="titulo-exterior text-center">Automatico</h2>
									</div>
									<div class="row">
										<!-- ASIGNAR JUGADA -->
										<div class="col-12 form">
											<table class="table table-striped">
												<tbody>
													<tr>
														<td>
															<input type="text" id="jugada_1" class="form-control titulo-exterior text-center auto" readonly="true" disabled="disabled" placeholder="B">
														</td>
														<td>
															<input type="text" id="jugada_2" class="form-control titulo-exterior text-center auto" readonly="true" disabled="disabled" placeholder="I">
														</td>
														<td>
															<input type="text" id="jugada_3" class="form-control titulo-exterior text-center auto" readonly="true" disabled="disabled" placeholder="N">
														</td>
														<td>
															<input type="text" id="jugada_4" class="form-control titulo-exterior text-center auto" readonly="true" disabled="disabled" placeholder="G">
														</td>
														<td>
															<input type="text" id="jugada_5" class="form-control titulo-exterior text-center auto" readonly="true" disabled="disabled" placeholder="O">
														</td>
														<td>
															<input type="text" id="jugada_6" class="form-control titulo-exterior text-center auto" readonly="true" disabled="disabled" placeholder="!">
														</td>
														<td>
															<button class="btn btn-info juego-nuevo" id="jugada_nueva">Jugar</button>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- CREAR JUGADA MANUAL -->
							<div class="col-12 mt-3">
								<div class="card p-2 contenedor-info">
									<div class="card-title">
										<h2 class="titulo-exterior text-center">Manual</h2>
									</div>
									<div class="row">
										<!-- ASIGNAR JUGADA -->
										<div class="col-12 form">
											<table class="table table-striped">
												<tbody>
													<tr>
														<td>
															<input type="text" id="jugada_1M" class="form-control titulo-exterior text-center manual" placeholder="" autocomplete="off">
														</td>
														<td>
															<input type="text" id="jugada_2M" class="form-control titulo-exterior text-center manual" placeholder="" autocomplete="off">
														</td>
														<td>
															<input type="text" id="jugada_3M" class="form-control titulo-exterior text-center manual" placeholder="" autocomplete="off">
														</td>
														<td>
															<input type="text" id="jugada_4M" class="form-control titulo-exterior text-center manual" placeholder="" autocomplete="off">
														</td>
														<td>
															<input type="text" id="jugada_5M" class="form-control titulo-exterior text-center manual" placeholder="" autocomplete="off">
														</td>
														<td>
															<input type="text" id="jugada_6M" class="form-control titulo-exterior text-center manual" placeholder="" autocomplete="off">
														</td>
														<td>
															<button class="btn btn-info juego-nuevo" id="jugada_manual">Jugar</button>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- SECCION DE GANADORES -->
					<div class="col-12 col-md-4">
						<div class="row">
							<!-- SECCION DE GANADORES -->
							<div class="col-12">
								<div class="card p-2 contenedor-info">
									<div class="row">
										<div class="col-12 mb-2">
											<div class="card">
												<h2 class="h4 m-0 p-2 card-title titulo-exterior text-center">Ganadores</h2>
											</div>
										</div>
										<div class="col-12 mb-2">
											<div class="card p-1 bg-warning primer-puesto text-white">
												<div class="row">
													<div class="col-12 text-center titulo-exterior">
														<i class="icon-perm_identity"></i>
														<span>1 puesto: </span><span class="aciertos" id="primero">0 Jugadores</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 mb-2">
											<div class="card p-1 bg-primary segundo-puesto text-white">
												<div class="row">
													<div class="col-12 text-center titulo-exterior">
														<i class="icon-perm_identity"></i>
														<span>2 puesto: </span><span class="aciertos" id="segundo">0 Jugadores</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 mb-2">
											<div class="card p-1 bg-danger tercer-puesto text-white">
												<div class="row">
													<div class="col-12 text-center titulo-exterior">
														<i class="icon-perm_identity"></i>
														<span>3 puesto: </span><span class="aciertos" id="tercero">0 Jugadores</span>
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 mb-2">
											<div class="card p-1 bg-success cuarto-puesto text-white">
												<div class="row">
													<div class="col-12 text-center titulo-exterior">
														<i class="icon-perm_identity"></i>
														<span>4 puesto: </span><span class="aciertos" id="cuarto">0 Jugadores</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../../js/Bootstrap/popper.min.js"></script>
	<script src="../../../js/Bootstrap/bootstrap.min.js"></script>
	<script>
		$('#jugada_nueva').on('click', function(e){
			e.preventDefault();
			llenarAleatorio();
			var fechaAct = fechaSolicitudBD();
			guardarJugada($('#jugada_1').val(),$('#jugada_2').val(),$('#jugada_3').val(),$('#jugada_4').val(),$('#jugada_5').val(),$('#jugada_6').val(), fechaAct);
			validarGanadores(fechaSolicitudBD());
			$(this).prop('disabled', 'true');
		});
		// JUGADA MANUAL
		$('#jugada_manual').on('click', function(e){
			e.preventDefault();
			var validate = '';
			$('tr>td>input.manual').each(function(){
				if ($(this).val() != '') {
					validate += 't';
				}
			});
			if (validate == 'tttttt') {
				var fechaAct = fechaSolicitudBD();
				guardarJugada($('#jugada_1M').val(),$('#jugada_2M').val(),$('#jugada_3M').val(),$('#jugada_4M').val(),$('#jugada_5M').val(),$('#jugada_6M').val(), fechaAct);
				validarGanadores(fechaSolicitudBD());
				alert('Jugada registrada correctamente');
				$('tr>td>input.manual').each(function(){
					$(this).val('');
				});
			} else {
				alert('Llene todas las casillas');
			}
		});
		// DEFINIR EL LARGO DE LA CASILLA
		$('.manual').on('keypress', function(){
			var dato = $(this).val().toUpperCase();
			if (dato == 'B' || dato == 'I' || dato == 'N' || dato == 'G' || dato == 'O') {
				$(this).attr('maxlength', '1');
			} else {
				$(this).attr('maxlength', '2');
			}
			return validaInput(event);
		});
		// DEFINIR VALORES EN LA CASILLA
		$('.manual').on('change', function(){
			if ($(this).val().length > 1) {
				$(this).val(validarNumeroLetra($(this).val()));
			}
			if ($(this).val() != '') {
				if ($(this).val() > 50) {
					$(this).val('50');
				} else if ($(this).val() < 1) {
					$(this).val('1');
				}
				if ($(this).val() < 10) {
					$(this).val('0'+$(this).val());
				}
			}
			if ($(this).val() == '001'
				|| $(this).val() == '002'
				|| $(this).val() == '003'
				|| $(this).val() == '004'
				|| $(this).val() == '005'
				|| $(this).val() == '006'
				|| $(this).val() == '007'
				|| $(this).val() == '008'
				|| $(this).val() == '009') {
				$(this).val($(this).val().substr(1,2));
			}
		});
		// ESTABLECER LIMITE DE JUEGO
		$('#establecer_jugada').on('click', function(e){
			e.preventDefault();
			if ($('#fecha_limite').val() != '') {
				$(this).removeClass('btn-info');
				$(this).addClass('btn-success');
				$(this).val('Fecha establecida');
				$(this).attr('disabled', 'true');
				$('#fecha_limite').attr('disabled', 'true');
			}
		});
		// VALIDAR VALORES DE LAS CASILLAS
		function validaInput(e){
			key = e.keyCode || e.which;
			tecla = String.fromCharCode(key).toLowerCase();
			letras = " bingo0123456789";
			especiales = [8, 37, 39, 46];
			tecla_especial = false
			for(var i in especiales) {
				if(key == especiales[i]) {
					tecla_especial = true;
					break;
				}
			}

			if(letras.indexOf(tecla) == -1 && !tecla_especial)
				return false;
		}
		// VALIDAR INGRESO DE CADENAS MIXTAS
		function validarNumeroLetra(valor) {
			valor = valor.toUpperCase();
			if (valor > 0 || valor < 51) {
				return valor;
			} else if (valor == 'B' || valor == 'I' || valor == 'N' || valor == 'G' || valor == 'O') {
				return valor;
			} else {
				return valor.substr(0,1);
			}
		}
		// FECHA DE SOLICITUD
		function fechaSolicitud(){
			var fecha = new Date();
			// DIA
			if (fecha.getDate() < 10) {
				dia = '0' + fecha.getDate();
			} else {
				dia = fecha.getDate();
			}
			// MES
			if ((fecha.getMonth() + 1) < 10) {
				var mes = '0' + (fecha.getMonth() + 1);
			} else {
				var mes = fecha.getMonth() + 1;
			}
			// AÑO
			var year = fecha.getFullYear();
			// FECHA ACTUAL
			return year + '-' + mes + '-' + dia;
		}
		// LLENAR JUGADA ALEATORIA
		function llenarAleatorio(){
			$('tr>td>input.auto').each(function(){
				var characters = "bingo1234567890";
				var char = "1";
				var paso = false;
				while (paso == false) {
					var pass = "";

					pass += characters.charAt(Math.floor(Math.random()*characters.length));
					if (pass == 'b' || pass == 'i' || pass == 'n' || pass == 'g' || pass == 'o') {
						paso = true;
					} else if (pass <= '5') {
						pass = Math.floor((Math.random() * 50) + 1);
						if (pass == '1' || pass == '2' || pass == '3' || pass == '4' || pass == '5' || pass == '6' || pass == '7' || pass == '8' || pass == '9') {
							pass = '0' + pass;
						}
						paso = true
					} else {
						if (pass == '6' || pass == '7' || pass == '8' || pass == '9') {
							pass = '0' + pass;
						}
						paso = true;
					}
					function validarAleatorio(){
						var cantidad = '';
						$('tr>td>input').each(function(){
							if ($(this).val() == pass) {
								cantidad = $(this).val();
							}
						});
						if (cantidad != '') {
							return false;
						} else {
							return true;
						}
					}
					paso = validarAleatorio();
				}
				$(this).val(pass);
			});
		}
		// FECHA SOLICITUD BD
		function fechaSolicitudBD(){
			var fecha = new Date();
			// DIA
			if (fecha.getDate() < 10) {
				dia = '0' + fecha.getDate();
			} else {
				dia = fecha.getDate();
			}
			// MES
			if ((fecha.getMonth() + 1) < 10) {
				var mes = '0' + (fecha.getMonth() + 1);
			} else {
				var mes = fecha.getMonth() + 1;
			}
			// AÑO
			var year = fecha.getFullYear();
			// FECHA ACTUAL
			return year + "-" + mes + "-" + dia;
		}
		// GUARDAR JUGADA
		function guardarJugada(jugada_1, jugada_2, jugada_3, jugada_4, jugada_5, jugada_6, fecha){
			$.ajax({
				url: 'registrarJuego.php',
				type: 'POST',
				dataType: 'html',
				data: {jugada_1: jugada_1, jugada_2: jugada_2, jugada_3: jugada_3, jugada_4: jugada_4, jugada_5: jugada_5, jugada_6: jugada_6, fecha: fecha},
			})
			.done(function(respuesta){
				if (respuesta == 'Exito') {
					console.log('Jugada registrada');
				} else {
					console.log('Error: ' + respuesta);
				}
			})
			.fail(function(){
				console.log('error');
			});
		}
		// VALIDAR GANADORES
		function validarGanadores(fecha){
			$.ajax({
				url: 'traerGanadores.php',
				type: 'POST',
				dataType: 'json',
				data: {fecha: fecha},
			})
			.done(function(respuesta){
				$('#primero').html(respuesta['primero'] + ' Jugadores');
				$('#segundo').html(respuesta['segundo'] + ' Jugadores');
				$('#tercero').html(respuesta['tercero'] + ' Jugadores');
				$('#cuarto').html(respuesta['cuarto'] + ' Jugadores');
			})
			.fail(function(){
				console.log('error');
			});
		}
		// ASIGNAR LIMITE DE JUGADA
		// function asignarLimite(consulta){
		// 	$.ajax({
		// 		url: 'traerGanadores.php',
		// 		type: 'POST',
		// 		dataType: 'json',
		// 		data: {consulta: consulta},
		// 	})
		// 	.done(function(respuesta){
		// 		if (respuesta == 'Exito') {
		// 			alert('Limite Establecido');
		// 		} else if (respuesta == 'Modificada') {
		// 			alert('Limite Modificado');
		// 		} else {
		// 			alert('Error: ' + respuesta);
		// 		}
		// 	})
		// 	.fail(function(){
		// 		console.log('error');
		// 	});
		// }
	</script>
</body>
</html>