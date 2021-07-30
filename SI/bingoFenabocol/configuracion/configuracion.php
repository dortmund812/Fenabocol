<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/SI/estilos-principal.css">
	<link rel="stylesheet" href="../../../css/Icomoon/style.css">
	<title>Mis Jugadas</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-5 pt-3">
				<div class="row">
					<div class="col-12 d-flex justify-content-center">
						<img src="../../../img/logo.png" alt="" class="w-50" style="border:1px solid  #aaa;border-radius: 50%;">
					</div>
					<div class="col-12">
						<h1 class="text-center titulo-exterior">Fenabocol ORG</h1>
					</div>
					<div class="col-12">
						<div class="card card-body mb-0 pb-0">
							<p class="card-text mb-0 pb-0" style="color: #aaa;">
								<small>
									<ol>
										<li>Para realizar cualquier cambio debera intoducir su contraseña actual en el campo correspondiente.</li>
										<li>Para cambiar la contraseña debera ingresar la contraseña actual, la nueva contraseña y confirmar la nueva contraseña en los campos correspondientes.</li>
										<li>El correo electronico no se podra cambiar ya que este el el identificador de acceso al sistema.</li>
									</ol>
								</small>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-7 pt-3">
				<!-- CAMBIO CONTRASEÑA, TELEFONO -->
				<form class="card form-group">
					<div class="row p-2 pt-3">
						<h2 class="col-12 titulo-exterior text-center">Actualizar Datos</h2>
						<!-- TELEFONO -->
						<div class="form-group col-12">
							<label for="cambio_telefono">Telefono</label>
							<input type="number" class="inpConf form-control" name="cambio_telefono" id="cambio_telefono" placeholder="Telefono">
						</div>
						<!-- CORREO -->
						<div class="form-group col-12">
							<label for="cambio_correo">Correo</label>
							<input type="email" class="inpConf form-control" name="cambio_correo" id="cambio_correo" placeholder="Correo" disabled="true" readonly="true">
						</div>
						<!-- CONTRASEÑA ACTUAL -->
						<div class="form-group col-12">
							<label for="password_actual">Contraseña actual*</label>
							<input type="password" class="inpConf form-control" name="password_actual" id="password_actual" placeholder="Contraseña Actual">
						</div>
						<!-- NUEVA CONTRASEÑA -->
						<div class="form-group col-12 col-lg-6 mb-lg-0">
							<label for="registro_password">Nueva contraseña</label>
							<input type="password" class="inpConf form-control" name="registro_password" id="registro_password" placeholder="Nueva Contraseña">
						</div>
						<!-- CONFIRMAR CONTARSEÑA -->
						<div class="form-group col-12 col-lg-6 mb-lg-0">
							<label for="registro_password2">Confirmar contraseña</label>
							<input type="password" class="inpConf form-control" name="registro_password2" id="registro_password2" placeholder="Confirmar Contraseña">
						</div>
						<p class="d-flex w-100 justify-content-end text-danger mb-0 pr-3" id="error_pass"></p>
						<p class="d-flex w-100 justify-content-end text-success mb-0 pr-3" id="success_pass"></p>
						<!-- REALIZAR CAMBIOS -->
						<div class="col-12 mt-3">
							<input type="submit" value="Actualizar Datos" id="actualizar" class="btn btn-block btn-info text-white">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../../js/Bootstrap/popper.min.js"></script>
	<script src="../../../js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS PROPIOS -->
	<script>
		$(document).ready(function(){
			traerDatos();
			$('#actualizar').on('click', function(e){
				e.preventDefault();
				if (validarCambios()) {
					var telefono = '';
					var password = '';
					if ($('#cambio_telefono').val() != '') {
						telefono = $('#cambio_telefono').val();
					} else {
						telefono = $('#cambio_telefono').attr('placeholder');
					}
					if ($('#registro_password').val() != '') {
						if ($('#registro_password').val() == $('#registro_password2')) {
							password = $('#registro_password').val();
						} else {
							mensaje('e', 'Los datos no coinciden.');
						}
					} else {
						password = '';
					}
					realizarCambios($('#cambio_telefono').val(), $('#registro_password').val(), $('#password_actual').val());
				} else {
					mensaje('e', 'No hay cambios por hacer.');
				}
			});
			function traerDatos(){
				$.ajax({
					url: 'traerDatos.php',
					type: 'POST',
					dataType: 'html',
					// data: {codigo, codigo},
				})
				.done(function(respuesta){
					var datos = JSON.parse(respuesta);
					$('#cambio_telefono').attr('placeholder', datos['telefono']);
					$('#cambio_correo').attr('placeholder', datos['correo']);
				})
				.fail(function(){
					console.log('error');
				});
			}
			// MENSAJES
			function mensaje(tipo, mensaje){
				$('#success_pass').text('');
				$('#error_pass').text('');
				if (tipo == 's') {
					$('#success_pass').text(mensaje);
					setTimeout(function(){
						$('#success_pass').text('');
					}, 3000);
				} else if (tipo == 'e') {
					$('#error_pass').text(mensaje);
					setTimeout(function(){
						$('#error_pass').text('');
					}, 3000);
				}
			}
			// VALIDAR CAMBIOS
			function validarCambios(){
				if (($('#cambio_telefono').val() != '')
					|| ($('#registro_password').val() != '' && $('#registro_password2').val() != '')) {
						return true;
				} else {
					return false;
				}
			}
			// REALIZAR CAMBIOS
			function realizarCambios(telefono, password, password2){
				$.ajax({
					url: 'cambios.php',
					type: 'POST',
					dataType: 'html',
					data: {telefono: telefono, password: password, password2: password2},
				})
				.done(function(respuesta){
					// var datos = JSON.parse(respuesta);
					if (respuesta == 'Error') {
						mensaje('e', 'Error en la solicitud.' + respuesta);
					} else if (respuesta == 'Contraseña incorrecta') {
						mensaje('e', respuesta);
					} else {
						mensaje('s', respuesta);
						$('.inpConf').val('');
						traerDatos();
					}
				})
				.fail(function(){
					console.log('error');
				});
			}
		});
	</script>
</body>
</html>