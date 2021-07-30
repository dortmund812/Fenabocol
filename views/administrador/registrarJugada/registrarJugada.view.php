<?php if (!empty($_SESSION)&&$_SESSION['jugador'] == 'fenabocolorg@gmail.com') {} else {die('Error usuario no autorizado');} ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/SI/estilos-principal.css">
	<link rel="stylesheet" href="../../../css/Icomoon/style.css">
	<title>Registrar Jugada</title>
</head>
<body>
	<style>
		.contenedor-balotas{
			width: 100%;
			font-size: 16px;
			display: flex;
			justify-content: space-around;
			flex-wrap: wrap;
			border: 1px solid #ccc;
			border-radius: 5px;
			padding: 8px;
		}
		.contenedor-balotas .balota{
			width: calc(100% / 7);
			height: 100%;
			background: #fff;
			border: 2px solid #000;
			line-height: 3.5rem;
			border-radius: 50%;
			text-align: center;
			text-transform: uppercase;
			box-shadow: inset -4px -3px 3px #262626;
		}
		.contenedor-balotas .balota::after{
			content: attr(data-info);
			font-size: 2em;
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
	<!-- CONTENIDO -->
	<div class="container-fluid">
		<div class="row pt-3">
			<!-- REGISTRAR JUGADA -->
			<div class="col-12 col-md-6">
				<form action="" class="card card-body" id="form">
					<label for="codigo" class="titulo-exterior text-center h3">Codigo de Jugada</label>
					<div class="input-group mb-2">
						<input type="text" class="form-control text-center impCodJug" name="codigo" id="codigo" minlength="8" maxlength="8" autocomplete="off" required="true" placeholder="Codigo Jugada">
						<div class="input-group-append">
							<button class="btn btn-info" type="button" id="buscarCodigoJugada">
								<i class="icon-search2"></i>
							</button>
						</div>
					</div>
					<div class="card card-body">
						<div class="form-group">
							<label for="nombreCliente">Nombre a registrar</label>
							<input type="text" class="form-control" name="nombreCliente" id="nombreCliente" autocomplete="off" placeholder="Nombre a Registrar">
						</div>
						<div class="form-group">
							<label for="tipoCliente">Tipo registro*</label>
							<select name="tipoCliente" id="tipoCliente" class="form-control">
								<!-- OPTIONS TIPO -->
								<?php echo $tipos ?>
							</select>
						</div>
						<div class="form-group">
							<label for="estadoPago">Estado*</label>
							<select name="estadoPago" id="estadoPago" class="form-control">
								<option value="NA" disabled="true" readonly="true" selected="true">Seleccionar</option>
								<option value="1">Confirmar</option>
								<option value="2">Rechazar</option>
							</select>
						</div>
						<button class="btn btn-block btn-success" id="regPago">Registrar Pago</button>
					</div>
				</form>
			</div>
			<!-- DETALLES DE JUGADA -->
			<div class="col-12 col-md-6">
				<div class="card card-body">
					<div class="card-title titulo-exterior text-center h3">Detalles Jugada</div>
					<div class="contenedor-balotas">
						<span class="balota" id="balota1" data-info='B'></span>
						<span class="balota" id="balota2" data-info='I'></span>
						<span class="balota" id="balota3" data-info='N'></span>
						<span class="balota" id="balota4" data-info='G'></span>
						<span class="balota" id="balota5" data-info='O'></span>
						<span class="balota" id="balota6" data-info='!'></span>
					</div>
					<table class="mt-2 table table-striped table-bordered text-center titulo-exterior">
						<tbody>
							<tr>
								<td>Valor</td>
								<td id="valor">$1000</td>
							</tr>
							<tr>
								<td>Pago</td>
								<td id="pago">Pendiente</td>
							</tr>
							<tr>
								<td>Estado</td>
								<td id="estadoJuego">Pendiente</td>
							</tr>
							<tr>
								<td>Fecha</td>
								<td id="fechaRegistro">--/--/--</td>
							</tr>
							<tr>
								<td>Juego</td>
								<td id="fechaJuego">--/--/--</td>
							</tr>
						</tbody>
					</table>
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
	<script src="../../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../../js/Bootstrap/popper.min.js"></script>
	<script src="../../../js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS PROPIOS -->
	<script>
		$(document).ready(function(){
			$('.balota').height($('.balota').width());
		});
		$('#buscarCodigoJugada').on('click', function(e){
			e.preventDefault();
			if($('#codigo').val() != '' && $('#codigo').val().length == 8){
				$('#pre-loader').addClass('active');
				$.ajax({
					url: 'buscarCodigo.php',
					type: 'POST',
					dataType: 'json',
					data: {codigo: $('#codigo').val()},
				})
				.done(function(response){
					alertMessage(response[0][0],response[0][1],response[0][2]);
					$(response[1]).each(function(indice,elemento){
						$('#balota'+(indice+1)).attr('data-info',elemento);
					});
					$('#pago').text(response[2][1]);
					$('#estadoJuego').text(response[2][0]);
					$('#fechaRegistro').text(response[2][2]);
					$('#fechaJuego').text(response[2][3]);

					$('#nombreCliente').val('');
					$('#tipoCliente').val('NA');
					$('#estadoPago').val('NA');
					$('#pre-loader').removeClass('active');
				})
				.fail(function(response){
					$('#pre-loader').removeClass('active');
					alertMessage('error','Error',response);
					console.log(response);
				});
			} else {
				alertMessage('error','Codigo Erroneo','Error al verificar el codigo, el codigo no cumple con los parametros.');
			}
		});
		// REGISTAR PAGO
		$('#regPago').on('click', function(e){
			e.preventDefault();
			if($('#codigo').val() != '' && $('#codigo').val().length == 8 && $('#tipoCliente').val() != 'NA'){
				$.ajax({
					url: 'registrarPago.php',
					type: 'POST',
					dataType: 'json',
					data: {codigo: $('#codigo').val(),
							nombre: $('#nombreCliente').val(),
							tipo: $('#tipoCliente').val(),
							estado: $('#estadoPago').val()
					},
				})
				.done(function(response){
					alertMessage(response[0][0],response[0][1],response[0][2]);
					if(response[0][0] == 'success'){
						$('#nombreCliente').val('');
						$('#tipoCliente').val('NA');
						$('#estadoPago').val('NA');
					}
					$('#pago').text(response[1][1]);
					$('#estadoJuego').text(response[1][0]);
					$('#fechaRegistro').text(response[1][2]);
					$('#fechaJuego').text(response[1][3]);

					$('#pre-loader').removeClass('active');
				})
				.fail(function(response){
					$('#pre-loader').removeClass('active');
					alertMessage('error','Error',response);
					console.log(response);
				});
			} else {
				alertMessage('error','Error','Error, los datos a registrar estan incompletos o no cumplen los parametros.');
			}
		});
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
	</script>
</body>
</html>