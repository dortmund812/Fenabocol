<?php if (!empty($_SESSION)&&$_SESSION['jugador'] == 'fenabocolorg@gmail.com') {} else {die('Error usuario no autorizado');} ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, 
	minimum-scale=1.0">
	<link rel="stylesheet" href="../../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/Icomoon/style.css">
	<title>Voluntarios</title>
</head>
<body>
	<style>
		/*LOADER*/
		.pre-loader{
			display: none;
			position: fixed;
			width: 100%;
			height: 100vh;
			background: rgba(0,0,0,.5);
			z-index: 2000;
		}
		.loader{
			position: absolute;
			top: 50%;
			left: 50%;
			border: 5px solid #f3f3f3; /* Light grey */
		    border-top: 5px solid #3498db; /* Blue */
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
			z-index: 10310;
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
			z-index: 10320;
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
	</style>
	<!-- LOADER -->
	<div class="pre-loader" id="pre-loader">
		<div class="loader"></div>
	</div>
	<!-- CONTENIDO -->
	<div class="container-fluid">
		<div class="d-flex justify-content-end pt-2">
			<button class="btn btn-success" id="addVoluntario" type="button" data-toggle="modal" data-target="#addVoluntarioModal"><i class="icon-plus"></i> Agregar</button>
		</div>
		<div class="row pt-2" id="contVolCard">
			<?php echo $voluntarios ?>
		</div>
	</div>
	<!-- MODAL INFO -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="POST" class="row">
						<!-- IDENTIFICACION -->
						<div class="col-6 form-group">
							<label for="nombreUser">Nombre*</label>
							<input type="text" class="form-control" name="nombreUser" id="nombreUser" placeholder="Nombre">
						</div>
						<!-- IDENTIFICACION -->
						<div class="col-6 form-group">
							<label for="tipoUser">Tipo*</label>
							<select name="tipoUser" id="tipoUser" class="form-control">
								<!-- OPTIONS TIPO -->
								<?php echo $tipos ?>
							</select>
						</div>
						<!-- IDENTIFICACION -->
						<div class="col-6 form-group">
							<label for="identUser">Identificacion*</label>
							<input type="text" class="form-control" name="identUser" id="identUser" placeholder="Identificación">
						</div>
						<!-- TELEFONO -->
						<div class="col-6 form-group">
							<label for="telefonoUser">Telefono*</label>
							<input type="text" class="form-control" name="telefonoUser" id="telefonoUser" placeholder="Telefono">
						</div>
						<!-- TELEFONO -->
						<div class="col-12 form-group">
							<label for="correoUser">Correo*</label>
							<input type="email" class="form-control" name="correoUser" id="correoUser" placeholder="Correo">
						</div>
						<!-- ESTADO -->
						<div class="col-6 form-group">
							<label for="estadoUser">Estado*</label>
							<select name="estadoUser" id="estadoUser" class="form-control">
								<!-- OPTIONS -->
								<option value="NA" selected="true" disabled="true">Seleccionar</option>
								<option value="0">Inactivo</option>
								<option value="1">Activo</option>
							</select>
						</div>
						<!-- ESTADO -->
						<div class="col-6 form-group">
							<label for="jugadasUser">Jugadas*</label>
							<input type="number" name="jugadasUser" id="jugadasUser" class="form-control" placeholder="Jugadas">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="save" data-volunt=""><i class="icon-save"></i> Guardar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- MODAL VOLUNTARIO -->
	<div class="modal fade" id="addVoluntarioModal" tabindex="-1" role="dialog" aria-labelledby="addVoluntarioModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="POST" class="row">
						<!-- IDENTIFICACION -->
						<div class="col-6 form-group">
							<label for="addNombreUser">Nombre*</label>
							<input type="text" class="form-control" name="addNombreUser" id="addNombreUser" placeholder="Nombre">
						</div>
						<!-- IDENTIFICACION -->
						<div class="col-6 form-group">
							<label for="addTipoUser">Tipo*</label>
							<select name="addTipoUser" id="addTipoUser" class="form-control">
								<!-- OPTIONS TIPO -->
								<?php echo $tipos ?>
							</select>
						</div>
						<!-- IDENTIFICACION -->
						<div class="col-6 form-group">
							<label for="addIdentUser">Identificacion*</label>
							<input type="text" class="form-control" name="addIdentUser" id="addIdentUser" placeholder="Identificación">
						</div>
						<!-- TELEFONO -->
						<div class="col-6 form-group">
							<label for="addTelefonoUser">Telefono*</label>
							<input type="text" class="form-control" name="addTelefonoUser" id="addTelefonoUser" placeholder="Telefono">
						</div>
						<!-- TELEFONO -->
						<div class="col-12 form-group">
							<label for="addCorreoUser">Correo*</label>
							<input type="email" class="form-control" name="addCorreoUser" id="addCorreoUser" placeholder="Correo">
						</div>
						<!-- ESTADO -->
						<div class="col-6 form-group">
							<label for="addEstadoUser">Estado*</label>
							<select name="addEstadoUser" id="addEstadoUser" class="form-control">
								<!-- OPTIONS -->
								<option value="NA" selected="true" disabled="true">Seleccionar</option>
								<option value="0">Inactivo</option>
								<option value="1">Activo</option>
							</select>
						</div>
						<!-- ESTADO -->
						<div class="col-6 form-group">
							<label for="addJugadasUser">Jugadas*</label>
							<input type="number" name="addJugadasUser" id="addJugadasUser" class="form-control" placeholder="Jugadas">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success" id="addSave"><i class="icon-save"></i> Agregar</button>
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
	<!-- SCRIPTS BOOTSTARP -->
	<script src="../../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../../js/Bootstrap/popper.min.js"></script>
	<script src="../../../js/Bootstrap/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			loadData();
			$('#addSave').on('click', function(e){
				e.preventDefault();
				if($('#addNombreUser').val() != '' && 
					$('#addIdentUser').val() != '' &&
					$('#addTelefonoUser').val() != '' &&
					$('#addCorreoUser').val() != '' &&
					$('#addEstadoUser').val() != 'NA' &&
					$('#addTipoUser').val() != 'NA' &&
					$('#addJugadasUser').val() >= 1){
					$.ajax({
						url: 'agregarVoluntario.php',
						type: 'POST',
						dataType: 'json',
						data: {identificacion: $('#addIdentUser').val(),
							nombre: $('#addNombreUser').val(),
							telefono: $('#addTelefonoUser').val(),
							correo: $('#addCorreoUser').val(),
							estado: $('#addEstadoUser').val(),
							jugadas: $('#addJugadasUser').val(),
							tipo: $('#addTipoUser').val()}
					})
					.done(function(response){
						alertMessage(response[0][0],response[0][1],response[0][2]);
						$('#contVolCard').html(response[1]);
						loadData();
						$('input').val('');
						$('select').val('NA');
						$('#pre-loader').removeClass('active');
					})
					.fail(function(response){
						$('#pre-loader').removeClass('active');
						alertMessage('error','Error',response);
						console.log('Error: '+response);
					});
				} else {
				alertMessage('error','Error','Los datos a ingresar estan incompletos, por favor complete correctamente los datos e intente de nuevo.');
				}
			});
			// CARGAR DATOS
			function loadData(){
				// VER AS INFORMACION
				$('.btnVerMas').on('click', function(e){
					e.preventDefault();
					$('#pre-loader').addClass('active');
					$.ajax({
						url: 'traerVoluntario.php',
						type: 'POST',
						dataType: 'json',
						data: {id: $(this).attr('id')},
					})
					.done(function(response){
						$('#nombreUser').val(response[1]);
						$('#identUser').val(response[2]);
						$('#telefonoUser').val(response[3]);
						$('#correoUser').val(response[4]);
						$('#estadoUser').val(response[5]);
						$('#jugadasUser').val(response[6]);
						$('#tipoUser').val(response[8]);
						$('#save').attr('data-volunt',response[0]);

						$('#pre-loader').removeClass('active');
					})
					.fail(function(response){
						$('#pre-loader').removeClass('active');
						alertMessage('error','Error',response);
						console.log('Error: '+response);
					});
				});
				// GUARDAR CAMBIOS
				$('#save').on('click', function(e){
					e.preventDefault();

					$.ajax({
						url: 'guardarVoluntario.php',
						type: 'POST',
						dataType: 'json',
						data: {id: $(this).attr('data-volunt'),
							identificacion: $('#identUser').val(),
							nombre: $('#nombreUser').val(),
							telefono: $('#telefonoUser').val(),
							correo: $('#correoUser').val(),
							estado: $('#estadoUser').val(),
							jugadas: $('#jugadasUser').val(),
							tipo: $('#tipoUser').val()
						},
					})
					.done(function(response){
						alertMessage(response[0][0],response[0][1],response[0][2]);
						$('#contVolCard').html(response[1]);
						loadData();
						$('#pre-loader').removeClass('active');
					})
					.fail(function(response){
						$('#pre-loader').removeClass('active');
						alertMessage('error','Error',response);
						console.log(response);
					});
				});
			}
			// ALERTA
			function alertMessage(tipo,titulo,mensaje){
				$('#alertMens').addClass('active');
				$('.iconAlert').addClass('d-none');
				$('#icon'+tipo).removeClass('d-none');
				$('.alerta').attr('class', 'alerta');
				$('.alerta').addClass(tipo);
				$('#tituloAlerta').text(titulo);
				$('#mensajeAlerta').html(mensaje);
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