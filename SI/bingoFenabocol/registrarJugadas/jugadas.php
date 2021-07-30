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
			<!-- CONTENIDO -->
			<div class="col-12">
				<div class="card p-2 my-3 contenedor-info">
					<h1 class="card-title text-center titulo-exterior">Bingo Fenabocol</h1>
				</div>
				<div class="row">
					<!-- INSTRUCCIONES -->
					<div class="col-12 col-md-5">
						<div class="card card-body contenedor-info">
							<h2 class="card-title text-center titulo-exterior">Instrucciones</h2>
							<p class="card-text text-center">Las instrucciones para jugar al bingo Fenabocol son muy sencillas, despues de haberte registrado deberas seguir las siguientes instrucciones:</p>
							<ol>
								<li>Digite sus 6 balotas o si lo prefiere haga su jugada automáticamente dando clic en el botón verde a la derecha de las casillas.</li>
								<li>Elija sus 6 balotas, seleccionando un numero entre el 1 y el 50 o usando las letras de la palabra bingo.</li>
								<li>Una vez realizada las jugadas haga clic en el botón azul para guardar las jugadas que halla realizado y al recibir el código de aprobación por cada, jugada. Guárdelos para reclamar su premio.</li>
								<li>Realice su pago a través de Nequi consignando al numero 3215495934 o tambien una consignación a la cuenta de Fenabocol ORG (Banco Pichincha/Cuenta de Ahorros/410725193) y agregando como mensaje de la consignación el código de validación de su jugada.</li>
								<li>Si desea realizar más jugadas, puede hacerlo dando clic en el botón verde en la parte inferior del juego o si lo prefiere haga las combinaciones de supredilección.</li>
								<li>Fenabocol ORG agradece su donación.</li>
							</ol>
						</div>
					</div>
					<!-- BINGO -->
					<div class="col-12 col-md-7 mt-3 mt-md-0">
						<div class="card card-body contenedor-info">
							<!-- CABECERA -->
							<div class="row">
								<div class="col-4 d-none d-md-block">
									<img src="../../../img/logo.png" alt="" class="w-100">
								</div>
								<div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
									<div class="centrar">
										<p class="card-text text-center text-uppercase titulo-exterior my-0">Aquí estamos con</p>
										<p class="card-text text-center text-uppercase titulo-exterior my-0 h3">Los Bomberos</p>
										<p class="card-text text-center text-uppercase titulo-exterior my-0">Aporto voluntariamente mi donacion para</p>
										<p class="card-text text-center text-uppercase titulo-exterior my-0 h4">Fenabocol Org.</p>
									</div>
								</div>
							</div>
							<!-- FECHA Y APORTE -->
							<div class="row mt-2">
								<!-- FECHA -->
								<div class="col-12 col-md-6">
									<label for="fecha_jugadas" class="text-center w-100 m-0 titulo-exterior">Fecha</label>
									<input type="text" name="fecha_jugadas" id="fecha_jugadas" class="form-control text-center titulo-exterior">
								</div>
								<!-- VALOR -->
								<div class="col-12 col-md-6">
									<label for="valor" class="text-center w-100 m-0 titulo-exterior">Valor</label>
									<input type="text" name="valor" id="valor" value="0" disabled="true" class="form-control text-center titulo-exterior">
								</div>
							</div>
							<!-- JUGADAS -->
							<form class="row mt-2">
								<!-- JUGADAS -->
								<table class="jugadas-tablero" id="jugadas_tablero">
									<!-- REGISTAR JUGADA -->
								</table>
								<!-- BOTONES DE GUARDAR Y AGREGAR -->
								<div class="col-12 mt-2">
									<div class="row">
										<div class="col-6 pr-1">
											<button class="btnJug btn btn-block btn-success text-center text-white" id="agregar_jugada">
												<i class="icon-plus"></i> Más Donaciones
											</button>
										</div>
										<div class="col-6 pl-1">
											<button class="btnJug btn btn-block btn-primary text-center text-white" id="guardar_jugadas">
												<i class="icon-save"></i> Guardar Jugadas
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- MODAL DE VER JUGADA REGISTRADA -->
			<button id="actModJA" data-toggle="modal" data-target="#jugadaRegistrada" style="width: -1px;height: -1px;position: absolute;top: 0;left: 0;opacity: 0;z-index: -1000;"></button>
			<div class="modal fade" id="jugadaRegistrada" tabindex="-1" role="dialog" aria-labelledby="jugadaRegistrada" aria-hidden="true">
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="card card-body">
							<!-- CABECERA -->
							<div class="row mb-3">
								<div class="col-4 d-none d-md-block">
									<img src="../../../img/logo.png" alt="" class="w-100">
								</div>
								<div class="col-12 col-md-8 d-flex justify-content-center align-items-center">
									<div class="centrar">
										<p class="card-text text-center text-uppercase titulo-exterior my-0">Aquí estamos con</p>
										<p class="card-text text-center text-uppercase titulo-exterior my-0 h3">Los Bomberos</p>
										<p class="card-text text-center text-uppercase titulo-exterior my-0">Aporto voluntariamente mi donacion para</p>
										<p class="card-text text-center text-uppercase titulo-exterior my-0 h4">Fenabocol Org.</p>
									</div>
								</div>
							</div>
							<!-- CONTENIDO -->
							<div class="row">
								<!-- TABLA DE JUGADAS -->
								<div class="col-12">
									<div class="card pb-0">
										<table class="table table-striped table-responsive-md mb-0 pb-0">
											<thead>
												<tr class="bg-danger text-white text-center">
													<td>Jugada</td>
													<td>Codigo</td>
													<td>Fecha</td>
												</tr>
											</thead>
											<tbody class="titulo-exterior text-center" id="tbodyRecibo">
												<!-- <tr>
													<td colspan="3">No hay jugadas</td>
												</tr> -->
												<tr>
													<td>B - I - N - G - O - 01</td>
													<td>7j3ngu1mt04j</td>
													<td>07/04/2020</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<!-- ESPECIFICACIONES -->
								<div class="col-12 mt-2">
									<p class="text-center"><small>Recuerde que debe guardar el codigo que se le ha asignado para poder validar su jugada, tambien podra ver los codigos de sus jugadas, así como su estado en la opcion de <strong>"Mis Jugadas"</strong> que se encuentra en el menu de esta pagina.</small></p>
								</div>
								<div class="col-12">
									<div class="row">
										<div class="col-12 col-md-6 pr-md-1 mb-2 mb-md-0">
											<button class="btn btn-block btn-danger" data-dismiss="modal" aria-label="Cerrar" id="cancelarJugadaMod"><span aria-hidden="true">Cancelar</span></button>
										</div>
										<div class="col-12 col-md-6 pl-md-1">
											<button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Cerrar" id="aprobarJugadasMod"><span aria-hidden="true">Aceptar</span></button>
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
		$(document).ready(function(){
			crearJugada();
			heightWidth();
			var jugadasReg = 0;
			setTimeout(function(){
				var dateD = new Date();
				if (dateD.getHours() >= 22 || dateD.getHours() <= 6) {
					$('input').attr('disabled', true);
					$('button.btnJug').attr('disabled', true);
					$('input').attr('id', '');
					$('input').attr('name', '');
					$('.btn-actfun').attr('name', '');
				}
				$('#fecha_jugadas').val(fechaSolicitud());
				$('#fecha_jugadas').attr('disabled', 'true');
			},1000);
			// DEFINIR EL LARGO DE LA CASILLA
			$('.casilla-jugada').on('keypress', function(){
				var dato = $(this).val().toUpperCase();
				if (dato == 'B' || dato == 'I' || dato == 'N' || dato == 'G' || dato == 'O') {
					$(this).attr('maxlength', '1');
				} else {
					$(this).attr('maxlength', '2');
				}
				return validaInput(event);
			});
			// DEFINIR VALORES EN LA CASILLA
			$('.casilla-jugada').on('change', function(){
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
			// CREAR NUEVO TABLERO
			$('#agregar_jugada').on('click', function(e){
				e.preventDefault();
				if(validarCasillas()){
					window.location.href = '../registrarJugadas/jugadas.php';
				} else {
					alert('llena todas las casillas');
				}
			});
			// LLENAR ALEATORIAMENTE LAS CASILLAS
			$('.btn-actfun').on('click', function(){
				llenarAleatorio($(this).attr('name'));
			});
			// GUARDAR JUGADAS
			$('#guardar_jugadas').on('click', function(e){
				e.preventDefault();
				if(calcularValor() < 5000){
					reciboJugadas();
					guardarCasillas();
				} else {
					alert('Ha llenado todas las casillas, agrege nuevas casillas');
				}
			});
			// DAR LARGO Y ANCHO A LAS CASILLAS
			function heightWidth(){
				$('.jugada-digito').height($('.jugada-digito').width());
				$('.casilla-jugada').css({
					'font-size' : ($('.jugada-digito').width()) / 1.5
				});
			}
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
			// ASIGNAR ID RANDOM
			function jugadaID(){
				var characters = "abcdefghijklmnopqrstuvwxyz0123456789";
				var pass = "";
				for (i=0; i < 12; i++){
					pass += characters.charAt(Math.floor(Math.random()*characters.length));
				}
				return pass;
			}
			// CREAR JUGADAS DEL TABLERO
			function crearJugada(){
				var tabla = '';
				for (var i = 0; i <= 4; i++) {
					var idJugada = jugadaID();
					var codigo = '';
					for (var j = 0; j <= 5; j++) {
						codigo += "<td class='jugada-digito'><input type='text' class='w-100 h-100 casilla-jugada titulo-exterior' maxlength='2'></td>";
					}
					codigo += "<td class='jugada-digito'><div class='btn btn-block btn-success text-white h-100 d-flex justify-content-center align-items-center btn-actfun' name='"+idJugada+"'><i class='icon-loop'></i></div></td>";
					tabla += "<tr class='trJug col-12 d-flex' id='"+idJugada+"'>"+codigo+"</tr>";
				}
				$('#jugadas_tablero').html(tabla);
				heightWidth();
			}
			// LLENAR ALEATORIAMENTE LAS CASILLAS
			function llenarAleatorio(fila){
				$('tr#'+fila+'>td>input').each(function(){
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
							$('tr#'+fila+'>td>input').each(function(){
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
			// VALIDAR QUE LAS CASILLAS ESTEN LLENAS
			function validarCasillas(){
				var validacion = 0;
				$('tr.trJug>td>input').each(function(indice, elemento){
					if($(this).val() == ''){
						validacion++;
					}
				});
				if (validacion == 0) {
					return true;
				} else {
					return false;
				}
			}
			// GUARDAR CASILLAS
			function guardarCasillas(){
				$('tr.trJug').each(function(indice, elemento){
					var idfila = $(this).attr('id');
					var identificador = '';
					if (idfila != '') {
						$('tr#'+idfila+'>td').each(function(indice2, elemento2){
							if ($(this).children('input').val() == '') {
								identificador += 'f';
							} else if ($(this).children('input').val() == undefined) {
								
							} else {
								identificador += 't';
							}
						});
						if (identificador == 'tttttt') {
							var jugada_1 = '';
							var jugada_2 = '';
							var jugada_3 = '';
							var jugada_4 = '';
							var jugada_5 = '';
							var jugada_6 = '';
							$('tr#'+idfila+'>td').each(function(indice3, elemento3){
								if (indice3 == '0') {
									jugada_1 = $(this).children('input').val().toLowerCase();
									$(this).children('input').addClass('casilla-verificada');
									$(this).children('input').attr('disabled', 'true');
									$(this).children('input').attr('readonly', 'true');
								} else if (indice3 == '1') {
									jugada_2 = $(this).children('input').val().toLowerCase();
									$(this).children('input').addClass('casilla-verificada');
									$(this).children('input').attr('disabled', 'true');
									$(this).children('input').attr('readonly', 'true');
								} else if (indice3 == '2') {
									jugada_3 = $(this).children('input').val().toLowerCase();
									$(this).children('input').addClass('casilla-verificada');
									$(this).children('input').attr('disabled', 'true');
									$(this).children('input').attr('readonly', 'true');
								} else if (indice3 == '3') {
									jugada_4 = $(this).children('input').val().toLowerCase();
									$(this).children('input').addClass('casilla-verificada');
									$(this).children('input').attr('disabled', 'true');
									$(this).children('input').attr('readonly', 'true');
								} else if (indice3 == '4') {
									jugada_5 = $(this).children('input').val().toLowerCase();
									$(this).children('input').addClass('casilla-verificada');
									$(this).children('input').attr('disabled', 'true');
									$(this).children('input').attr('readonly', 'true');
								} else if (indice3 == '5') {
									jugada_6 = $(this).children('input').val().toLowerCase();
									$(this).children('input').addClass('casilla-verificada');
									$(this).children('input').attr('disabled', 'true');
									$(this).children('input').attr('readonly', 'true');
								}
							});
							var fechaUp = fechaSolicitudBD();
							$('#actModJA').click();
							// APROBAR JUGADAS
							$('#aprobarJugadasMod').on('click', function(){
								$.ajax({
									url: 'guardarJugada.php',
									type: 'POST',
									dataType: 'html',
									data: {jugada_1: jugada_1, jugada_2: jugada_2, jugada_3: jugada_3, jugada_4: jugada_4, jugada_5: jugada_5, jugada_6: jugada_6, idfila: idfila, fechaUp: fechaUp},
								})
								.done(function(respuesta){
									if (respuesta == 'Exito') {
										console.log('Jugada registrada');
										$('div[name="'+idfila+'"]').removeClass('btn-actfun');
										$('div[name="'+idfila+'"]').attr('name', '');
										$('tr#'+idfila).attr('id', '');
									} else if (respuesta == 'JugadaRegistrada') {
										console.log('Jugada ya registrada');
									} else {
										console.log('Error: ' + respuesta);
									}
								})
								.fail(function(){
									console.log('error');
								});
							});
							// CANCELAR JUGADAS
							$('#cancelarJugadaMod').on('click', function(){
								$('tr#'+idfila+'>td').each(function(indice3, elemento3){
									if (indice3 == '0') {
										$(this).children('input').removeClass('casilla-verificada');
										$(this).children('input').prop('disabled', false);
										$(this).children('input').prop('readonly', false);
									} else if (indice3 == '1') {
										$(this).children('input').removeClass('casilla-verificada');
										$(this).children('input').prop('disabled', false);
										$(this).children('input').prop('readonly', false);
									} else if (indice3 == '2') {
										$(this).children('input').removeClass('casilla-verificada');
										$(this).children('input').prop('disabled', false);
										$(this).children('input').prop('readonly', false);
									} else if (indice3 == '3') {
										$(this).children('input').removeClass('casilla-verificada');
										$(this).children('input').prop('disabled', false);
										$(this).children('input').prop('readonly', false);
									} else if (indice3 == '4') {
										$(this).children('input').removeClass('casilla-verificada');
										$(this).children('input').prop('disabled', false);
										$(this).children('input').prop('readonly', false);
									} else if (indice3 == '5') {
										$(this).children('input').removeClass('casilla-verificada');
										$(this).children('input').prop('disabled', false);
										$(this).children('input').prop('readonly', false);
									}
								});
							});
						} else {
							console.log('La fila: ' +indice+' esta incompleta');
						}					
					}
				});
				$('#valor').val('$' + calcularValor());
			}
			// CALCULAR VALOR
			function calcularValor(){
				var contador = 0;
				$('tr.trJug>td').each(function(indice2, elemento2){
					if ($(this).children('input').hasClass('casilla-verificada')) {
						contador++;
					}
				});
				return (contador/6)*1000;
			}
			// FECHA SOLICITUD
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
				return dia + "/" + mes + "/" + year;
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
			// CREAR RECIBO
			function reciboJugadas(){
				var reciboTb = '';
				
				$('tr.trJug').each(function(indice, elemento){
					if ($(this).attr('id') != '') {
						if ($('tr:nth-child('+(indice+1)+') td:nth-child(1) input').val() != '') {
							reciboTb += '<tr>';
								reciboTb += '<td>';
									$('tr:nth-child('+(indice+1)+') input').each(function(indice2, elemento2){
										reciboTb += $(this).val();
										if (indice2 != 5) {
											reciboTb += "-";
										}
									});
								reciboTb += '</td>';
								reciboTb += '<td>'+$(this).attr('id')+'</td>';
								reciboTb += '<td>'+fechaSolicitud()+'</td>';

							reciboTb += '</tr>';
						}
					}
				});
				$('#tbodyRecibo').html(reciboTb);
			}
		});
	</script>
</body>
</html>