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
		.jugada-digito,
		.jugada-digito2{
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
		.jugada-digito2>p{
			background: none;
		}
	</style>
	<div class="container-fluid pb-3">
		<div class="row">
			<!-- JUGADA ASIGNADA -->
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
								<li>Ingrese el codigo que se le ha asignado en campo indicado para poder registrar su jugada.</li>
								<li>Digite sus 6 balotas o si lo prefiere haga su jugada automáticamente dando clic en el botón verde a la derecha de las casillas.</li>
								<li>Elija sus 6 balotas, seleccionando un numero entre el 1 y el 50 o usando las letras de la palabra bingo.</li>
								<li>Una vez realizada las jugadas haga clic en el botón azul para guardar las jugadas que halla realizado.</li>
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
								<!-- CODIGO -->
								<div class="col-12">
									<label for="codigoAsignado" class="text-center w-100 m-0 titulo-exterior">Codigo Asignado</label>
									<div class="input-group">
										<input type="text" class="form-control titulo-exterior text-center" name="codigoAsignado" id="codigoAsignado" placeholder="Ingresar Codigo" maxlength="12" required="true" autocomplete="off">
										<div class="input-group-append">
											<button class="btn btn-success" id="agregar_jugadas">Agregar</button>
										</div>
									</div>

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
										<div class="col-12">
											<button class="btn btn-block btn-primary text-center text-white" id="guardar_jugadas">
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
								<div class="col-12 col-md-6 pr-md-1 mb-2 d-flex justify-content-center align-items-center">
									<p class="card w-100 h-100 mb-0 titulo-exterior text-center">Su codigo es: <span class="text-success h5" id="cident">------------</span></p>
								</div>
								<div class="col-12 col-md-6 pl-md-1 mb-2 d-flex justify-content-center align-items-center">
									<p class="card w-100 h-100 mb-0 titulo-exterior text-center">Fecha: <span class="text-success h5" id="fechaJug"></span></p>
								</div>
								<div class="col-12 mb-2 d-flex justify-content-center">
									<p class="card w-100 h-100 mb-0 titulo-exterior text-center">Su jugada sera: <span class="text-success h5" id="esjug">--------</span></p>
								</div>
								<div class="col-12 d-flex justify-content-center">
									<!-- JUGADAS -->
									<table class="jugadas-tablero" id="jugEscApr">
										<!-- MOSTRAR JUGADA CREADA -->
										<tr class='col-12'>
											<td class='jugada-digito2'>
												<p class="1 mb-0 pb-0 casilla-jugada titulo-exterior"></p>
											</td>
											<td class='jugada-digito2'>
												<p class="2 mb-0 pb-0 casilla-jugada titulo-exterior"></p>
											</td>
											<td class='jugada-digito2'>
												<p class="3 mb-0 pb-0 casilla-jugada titulo-exterior"></p>
											</td>
											<td class='jugada-digito2'>
												<p class="4 mb-0 pb-0 casilla-jugada titulo-exterior"></p>
											</td>
											<td class='jugada-digito2'>
												<p class="5 mb-0 pb-0 casilla-jugada titulo-exterior"></p>
											</td>
											<td class='jugada-digito2'>
												<p class="6 mb-0 pb-0 casilla-jugada titulo-exterior"></p>
											</td>
										</tr>
									</table>
								</div>
								<div class="col-12 mt-3">
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
			heightWidth();
			crearJugada();
			$('.casilla-jugada').attr('disabled', true);
			$('.btn-actfun').attr('disabled', true);
			$('#guardar_jugadas').attr('disabled', true);
			var jugadasReg = 0;
			// CREAR JUGADAS
			$('#agregar_jugadas').on('click', function(e){
				e.preventDefault();
				if ($('#codigoAsignado').val() != '' || $('#codigoAsignado').val().length == 12) {
					validarCodigo($('#codigoAsignado').val());
				} else {
					alert('Ingrese El codigo');
				}
			});
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
			$('.btn-actfun').on('click', function(e){
				e.preventDefault();
				llenarAleatorio($(this).attr('name'));
			});
			// GUARDAR JUGADAS
			$('#guardar_jugadas').on('click', function(e){
				e.preventDefault();
				if (validarCasillas()) {
					$('#actModJA').click();
					guardarCasillas($('.btn-actfun').attr('name'));
				} else {
					alert('Llene todas las casillas para continuar');
				}
			});
			// DAR LARGO Y ANCHO A LAS CASILLAS
			function heightWidth(){
				$('.jugada-digito').height($('.jugada-digito').width());
				$('.jugada-digito2').width($('.jugada-digito').height());
				$('.jugada-digito2').height($('.jugada-digito').width());
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
			// CREAR JUGADAS DEL TABLERO
			function crearJugada(){
				var tabla = '';
				var codigo = '';
				for (var j = 0; j <= 5; j++) {
					codigo += "<td class='jugada-digito'><input type='text' class='w-100 h-100 casilla-jugada titulo-exterior casilla-verificada' maxlength='2'></td>";
				}
				codigo += "<td class='jugada-digito'><button class='btn btn-block btn-success text-white h-100 d-flex justify-content-center align-items-center btn-actfun' name=''><i class='icon-loop'></i></button></td>";
				tabla += "<tr class='col-12 d-flex inp-rand' id=''>"+codigo+"</tr>";
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
				$('tr>td>input').each(function(indice, elemento){
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
			function guardarCasillas(codigovalid){
				$('tr').each(function(indice, elemento){
					var idfila = codigovalid;
					var identificador = '';
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
						var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
						var f=new Date();
						var fechaUp = fechaSolicitudBD();
						$('#fechaJug').text(fechaSolicitud());
						$('p.1').text(jugada_1);
						$('p.2').text(jugada_2);
						$('p.3').text(jugada_3);
						$('p.4').text(jugada_4);
						$('p.5').text(jugada_5);
						$('p.6').text(jugada_6);
						$('span#cident').text(idfila);
						$('#esjug').text('Aprobada');

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
									$('#codigoAsignado').attr('disabled', false);
									$('#codigoAsignado').attr('readonly', false);
									$('#codigoAsignado').val('');
									$('#agregar_jugadas').attr('disabled', false);
									$('.casilla-jugada').attr('disabled', true);
									$('.casilla-jugada').addClass('casilla-verificada');
									$('.casilla-jugada').val('');
									$('.btn-actfun').attr('disabled', true);
									$('#guardar_jugadas').attr('disabled', true);
								} else if (respuesta == 'JugadaRegistrada') {
									console.log('Jugada ya registrada');
								} else {
									console.log('Error: ' + respuesta);
									$('#esjug').removeClass('text-success');
									$('#esjug').addClass('text-danger');
									$('#esjug').text('Denegada 2');
								}
							})
							.fail(function(){
								console.log('error');
							});
						});
						$('#cancelarJugadaMod').on('click', function(){
							$('tr#'+idfila+'>td').each(function(){
								$(this).children('input').removeClass('casilla-verificada');
								$(this).children('input').attr('disabled', false);
								$(this).children('input').attr('readonly', false);
							});
						});
					} else {
						console.log('La fila: ' +indice+' esta incompleta');
					}					
				});
			}
			// VALIDAR CODIGO
			function validarCodigo(codigo){
				$.ajax({
					url: 'validarCodigo.php',
					type: 'POST',
					dataType: 'html',
					data: {codigo, codigo},
				})
				.done(function(respuesta){
					if (respuesta == 'Exito') {
						$('#codigoAsignado').attr('disabled', true);
						$('#agregar_jugadas').attr('disabled', true);
						$('.casilla-jugada').removeClass('casilla-verificada');
						$('.casilla-jugada').attr('disabled', false);
						$('.btn-actfun').attr('name', codigo);
						$('.inp-rand').attr('id', codigo);
						$('.btn-actfun').attr('disabled', false);
						$('#guardar_jugadas').attr('disabled', false);
					} else {
						alert('El codigo no es valido');
						$('.btn-actfun').attr('disabled', true);
						$('#guardar_jugadas').attr('disabled', true);
						$('#codigoAsignado').attr('disabled', false);
						$('#codigoAsignado').attr('readonly', false);
						$('#agregar_jugadas').attr('disabled', false);
						$('.casilla-jugada').attr('disabled', true);
						$('.casilla-jugada').addClass('casilla-verificada');
					}
				})
				.fail(function(){
					console.log('error');
				});
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
		});
	</script>
</body>
</html>