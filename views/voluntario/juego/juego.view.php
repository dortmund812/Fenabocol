<?php if (!empty($_SESSION['jugador'])&&$_SESSION['rol'] == 'voluntario') {} else {die('Error usuario no autorizado');} ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- META -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- LINK -->
	<link rel="stylesheet" href="../../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/SI/estilos-principal.css">
	<link rel="stylesheet" href="../../../css/Icomoon/style.css">
	<!-- FAVICON -->
	<link rel="shortcut icon" href="../../../img/logo.png">
	<!-- TITULO -->
	<title>Fenabocol ORG</title>
</head>
<body>
	<style>
		.contenedor-balotas{
			width: 100%;
			font-size: 16px;
			display: flex;
			justify-content: space-around;
		}
		.contenedor-balotas .balota{
			width: 8em;
			height: 8em;
			background: #fff;
			border: 2px solid #000;
			border-radius: 50%;
			display: inline-block;
			line-height: 7.5em;
			text-align: center;
			text-transform: uppercase;
			box-shadow: inset -4px -3px 3px #262626;
		}
		.contenedor-balotas .balota::after{
			content: attr(data-info);
			font-size: 4em;
			text-transform: uppercase;
		}
		.contenedor-creajuego{
			width: 100%;
		}
		.contenedor-creajuego .jugadaCrea{
			width: calc(100% / 10);
			height: 5rem;
			outline: none;
			text-align: center;
			padding: 0;
			margin: 0;
			font-size: 5rem;
			line-height: 5rem;
			text-transform: uppercase;
			border: 1px solid;
		}
		.img-mod-prac{
			width: 80%;
			max-height: 180px;
		}
		.impCodJug{
			font-size: 1.3rem;
			line-height: 0;
			text-transform: uppercase;
		}
		/* ============================== ALERTA ============================== */
		.contenedor-alerta{
			display: none;
		}
		.contenedor-alerta.active{
			width: 100%;
			height: 100vh;
			position: fixed;
			top: 0;
			left: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			z-index: 1031;
			background: rgba(255,255,255,.3);
		}
		.alerta{
			width: 400px;
			max-width: 98%;
			height: 300px;
			max-height: 90%;
			background: #fff;
			box-shadow: 0 0 15px #bbb;
			border-radius: 10px;
			z-index: 1032;
			transform: scale(.5);
			transition: .5s;
		}
		.titulo-alerta{
			text-align: center;
			height: 18%;
		}
		.titulo-alerta h2{
			font-size: 2.5rem;
		}
		.mensaje-alerta{
			width: 100%;
			height: calc(100% - 36%);
			padding: 10px;
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
			position: relative;
		}
		.mensaje-alerta i{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			opacity: .2;
			font-size: 12rem;
		}
		.imp-alerta{
			width: 100%;
			height: 18%;
			display: flex;
			justify-content: center;
			align-items: center;
			border-top: 1px solid #ccc;
		}
		.imp-alerta .btn-alerta{
			width: 30%;
			height: 80%;
			border: none;
			outline: none;
			border-radius: 8px;
			color: #fff;
			font-size: 1.2rem;
			cursor: pointer;
		}
		
		/* ===== SUCCESS ===== */
		.alerta.success .mensaje-alerta i{
			color: #28B463;
		}
		.alerta.success .imp-alerta .btn-alerta{
			border: 1px solid #1B9E52;
			background: #28B463;
		}
		.alerta.success .imp-alerta .btn-alerta:hover{
			background: #17A553;
		}
		/* ===== INFO ===== */
		.alerta.info .mensaje-alerta i{
			color: #3498DB;
		}
		.alerta.info .imp-alerta .btn-alerta{
			border: 1px solid #2179B4;
			background: #3498DB;
		}
		.alerta.info .imp-alerta .btn-alerta:hover{
			background: #1A80C4;
		}
		/* ===== ERROR ===== */
		.alerta.error .mensaje-alerta i{
			color: #D82B2B;
		}
		.alerta.error .imp-alerta .btn-alerta{
			border: 1px solid #C0392B;
			background: #D82B2B;
		}
		.alerta.error .imp-alerta .btn-alerta:hover{
			background: #BD1C1C;
		}
		/* ========== LOADERESP ========== */
		.pre-loader{
			display: none;
			position: fixed;
			width: 100%;
			height: 100vh;
			background: rgba(255,255,255,.5);
			z-index: 2000;
		}
		.loaderEsp{
			position: absolute;
			top: 50%;
			left: 50%;
			border: 5px solid #f3f3f3;
		    border-top: 5px solid #3498DB;
		    border-radius: 50%;
		    width: 50px;
		    height: 50px;
		    animation: spin 2s linear infinite;
		}
		.pre-loader.active {
			display: block;
		}
		@keyframes spin {
		    0% { transform: rotate(0deg); }
		    100% { transform: rotate(360deg); }
		}
	</style>
	<!-- LOADER ESPERA -->
	<div class="pre-loader" id="pre-loader">
		<div class="loaderEsp"></div>
	</div>
	<!-- CONTAINER -->
	<div class="container-fluid my-5 pt-4 contenedor-principal">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-2 cont-img-jug">
						<img src="../../../img/OSIODG1.png" alt="Colombia" class="img-mod-prac w-100">
					</div>
					<div class="col-8">
						<h1 class="titulo-exterior text-center">Juegue al Bingo Ganacol</h1>
						<p>Digite sus 6 balotas o si lo prefiere haga su jugada automáticamente dando clic en el botón verde a la derecha de las casillas, Elija sus 6 balotas, seleccionando un numero entre el 1 y el 50 o usando las letras de la palabra bingo.</p>
						<audio controls autoplay style="border: 1px solid;border-radius: 1000px;">
							<source src="../../../audio/Bienvenido-al-bingo-fenabocol.mp3" type="audio/mpeg">
						</audio>
					</div>
					<div class="col-2 cont-img-jug">
						<img src="../../../img/OJXLD71 [Convertido].png" alt="Colombia" class="img-mod-prac">
					</div>
				</div>
				<div class="row">
					<div class="col-12 contenedor-balotas">
						<span class="balota" id="balota1" data-info='B'></span>
						<span class="balota" id="balota2" data-info='I'></span>
						<span class="balota" id="balota3" data-info='N'></span>
						<span class="balota" id="balota4" data-info='G'></span>
						<span class="balota" id="balota5" data-info='O'></span>
						<span class="balota" id="balota6" data-info='!'></span>
					</div>
				</div>
				<div class="row">
					<div class="col-12 contenedor-jugadas pt-4">
						<div class="card card-body contenedor-info">
							<div class="d-flex justify-content-end">
								<button class="btn btn-success d-none"><i class="icon-plus"></i> Agregar</button>
							</div>
							<!-- JUGADAS -->
							<table class="jugadas-tablero contenedor-creajuego" id="jugadas_tablero">
								<!-- REGISTAR JUGADA -->
							</table>
							<div class="contenedor-button mt-2">
								<button class="btn btn-success btn-block" id="iniJug">!!! Jugar !!!</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ALERTA -->
	<div class="contenedor-alerta" id="alertMens">
		<div class="alerta info">
			<div class="titulo-alerta titulo-exterior">
				<h2 id="tituloAlerta">Error</h2>
			</div>
			<div class="mensaje-alerta">
				<i class="icon-report d-none iconAlert" id="iconerror"></i>
				<i class="icon-info d-none iconAlert" id="iconinfo"></i>
				<i class="icon-check_circle d-none iconAlert" id="iconsuccess"></i>

				<p id="mensajeAlerta" class="">Mensaje</p>
			</div>
			<div class="imp-alerta">
				<button class="btn-alerta" id="closeAlert">Cerrar</button>
			</div>
		</div>
	</div>
	<audio id="0a">
		<source src="../../../audio/0a.mp3" type="audio/mpeg">
	</audio>
	<audio id="1a">
		<source src="../../../audio/1a.mp3" type="audio/mpeg">
	</audio>
	<audio id="2a">
		<source src="../../../audio/2a.mp3" type="audio/mpeg">
	</audio>
	<audio id="3a">
		<source src="../../../audio/3a.mp3" type="audio/mpeg">
	</audio>
	<audio id="4a">
		<source src="../../../audio/4a.mp3" type="audio/mpeg">
	</audio>
	<audio id="5a">
		<source src="../../../audio/5a.mp3" type="audio/mpeg">
	</audio>
	<audio id="6a">
		<source src="../../../audio/6a.mp3" type="audio/mpeg">
	</audio>
	<!-- SCRIPTS BOOTSTRAP -->
	<script src="../../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../../js/Bootstrap/popper.min.js"></script>
	<script src="../../../js/Bootstrap/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			crearJugada();
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
			// LLENAR ALEATORIAMENTE LAS CASILLAS
			$('.btn-actfun').on('click', function(){
				llenarAleatorio($(this).attr('name'));
			});
			// INICIAR JUEGO
			$('#iniJug').on('click', function(e){
				e.preventDefault();
				if(validarCasillas()){
					// =========================== PENDIENTE ===========================
					realizarJuego(dataJugadas());
				} else {
					alertMessage('error','Error','Error, completa correctamente todas las casillas antes de iniciar o guardar el juego.');
				}
			});
			// CODIGO JUGADA
			$('#codigoJug').val(jugadaID());
			// ASIGNAR ID RANDOM
			function jugadaID(){
				var characters = "abcdefghijklmnopqrstuvwxyz0123456789";
				var pass = "";
				for (i=0; i < 8; i++){
					pass += characters.charAt(Math.floor(Math.random()*characters.length));
				}
				return pass;
			}
			// CREAR JUGADAS DEL TABLERO
			function crearJugada(){
				var tabla = '';
				for (var i = 0; i < 1; i++) {
					var idJugada = jugadaID();
					var codigo = '';
					for (var j = 0; j <= 5; j++) {
						codigo += "<td class='jugada-digito'><input type='text' class='w-100 h-100 casilla-jugada titulo-exterior jugadaCrea' maxlength='2'></td>";
					}
					codigo += "<td class='jugada-digito'><div class='btn btn-block btn-success text-white h-100 d-flex justify-content-center align-items-center btn-actfun' name='"+idJugada+"'><i class='icon-loop'></i></div></td>";
					tabla += "<tr class='trJug col-12 d-flex' id='"+idJugada+"'>"+codigo+"</tr>";
				}
				$('#jugadas_tablero').html(tabla);
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
			// REALIZAR JUEGO
			function realizarJuego(jugadas){
				$('#pre-loader').addClass('active');
				$.ajax({
					url: 'guardarJuego.php',
					type: 'POST',
					dataType: 'json',
					data: {jugadas: jugadas},
				})
				.done(function(response){
					$('#pre-loader').removeClass('active');
					if(response[0][0]=='success'){
						alterAleatorio(response[1]);
						setTimeout(function(){
							alertMessage(response[0][0],response[0][1],response[0][2]);
							$('#'+response[2]+'a')[0].play();
						},7300);
					} else {
						alertMessage(response[0][0],response[0][1],response[0][2]);
					}
					console.log(response);
					// =========================== PENDIENTE ===========================
				})
				.fail(function(response){
					$('#pre-loader').removeClass('active');
					alertMessage('error','Error',response);
					console.log(response);
				});
			}
			// DATA JUGADAS
			function dataJugadas(){
				var jugadas = [];
				$('tr.trJug>td>input').each(function(indice, elemento){
					jugadas.push($(this).val());
				});
				return jugadas;
			}
			// LLENAR ALEATORIAMENTE LAS CASILLAS
			function alterAleatorio(resultado){
				$('.contenedor-balotas .balota').attr('data-info',' ');
				var iterador = 0;
				var characters = "bingo1234567890";
				var each = setInterval(function(){

					var each2 = setInterval(function(){
						var pass = "";
						pass += characters.charAt(Math.floor(Math.random()*characters.length));
						$('.contenedor-balotas .balota:nth-child('+iterador+')').attr('data-info',pass);
					},30);
					setTimeout(function(){
						clearInterval(each2);
					},870);
					var balota = resultado[iterador-1];
					$('.contenedor-balotas .balota:nth-child('+iterador+')').attr('data-info',balota);
					iterador++;
				},900);
				setTimeout(function(){
					clearInterval(each);
				},7100);
			}
			// ALERTA
			function alertMessage(tipo,titulo,mensaje){
				$('#alertMens').addClass('active');
				$('.iconAlert').addClass('d-none');
				$('#icon'+tipo).removeClass('d-none');
				$('.alerta').attr('class', 'alerta');
				$('.alerta').addClass(tipo);
				$('#tituloAlerta').text(titulo);
				$('#mensajeAlerta').text(mensaje);
				setTimeout(function(){
					$('.alerta').css({
						'transform':'scale(1)'
					});
				},50);
				// CERRAR ALERTA
				$('#closeAlert').on('click', function(){
					$('.alerta').css({
						'transform':'scale(.7)'
					});
					setTimeout(function(){
						$('#alertMens').removeClass('active');
					}, 400);
				});
			}
		});
	</script>
</body>
</html>