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
	<style>
		.jugadas-tablero tr td{
			border: 1px solid;
			width: 16.66%;
			text-align: center;
		}
	</style>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 my-3">
				<div class="card card-body contenedor-info">
					<div class="card contenedor-info">
						<h2 class="titulo-exterior text-center">Ultima Jugada Ganadora</h2>
						<h3 class="titulo-exterior text-center">
							<span id="traerJugada">b-i-n-g-o-01</span>
						</h3>
					</div>
				</div>
			</div>
			<form action="" class="col-12">
				<div class="row">
					<div class="col-4">
						<div class="form-group">
							<label for="codigo" class="my-0 pl-2">Buscar por codigo</label>
							<input type="text" class="form-control" placeholder="Codigo" name="codigo" id="codigo">
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="fecha" class="my-0 pl-2">Buscar por fecha</label>
							<input type="date" name="fecha" id="fecha" class="form-control">
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="estado" class="my-0 pl-2">Buscar por estado</label>
							<select name="estado" id="estado" class="form-control">
								<option value="" selected="true">Todos</option>
								<option value="1">En espera</option>
								<option value="2">Confirmada</option>
								<option value="3">Gano</option>
								<option value="4">No Gano</option>
							</select>
						</div>
					</div>
				</div>
			</form>
			<!-- TABLA DE RESULTADO -->
			<table class="col-12 table table-striped table-responsive-md">
				<thead>
					<tr class="bg-danger text-white text-center">
						<th>Jugada1</th>
						<th>Jugada2</th>
						<th>Jugada3</th>
						<th>Jugada4</th>
						<th>Jugada5</th>
						<th>Jugada6</th>
						<th>Codigo</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th><i class="icon-plus text-white"></i></th>
					</tr>
				</thead>
				<tbody class="text-center titulo-exterior" id="tbody">
					<!-- JUGADAS -->
				</tbody>
			</table>
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
									<p class="card w-100 h-100 mb-0 titulo-exterior text-center">El estado de su jugada es: <span class="text-success h5" id="esjug">--------</span></p>
								</div>
								<div class="col-12">
									<!-- JUGADAS -->
									<table class="jugadas-tablero w-100" id="jugEscApr">
										<!-- MOSTRAR JUGADA CREADA -->
										<tr class='col-12'>
											<td class='mosJug'>
												<p class="1 mb-0 pb-0 casilla-jugada h3 py-2 titulo-exterior"></p>
											</td>
											<td class='mosJug'>
												<p class="2 mb-0 pb-0 casilla-jugada h3 py-2 titulo-exterior"></p>
											</td>
											<td class='mosJug'>
												<p class="3 mb-0 pb-0 casilla-jugada h3 py-2 titulo-exterior"></p>
											</td>
											<td class='mosJug'>
												<p class="4 mb-0 pb-0 casilla-jugada h3 py-2 titulo-exterior"></p>
											</td>
											<td class='mosJug'>
												<p class="5 mb-0 pb-0 casilla-jugada h3 py-2 titulo-exterior"></p>
											</td>
											<td class='mosJug'>
												<p class="6 mb-0 pb-0 casilla-jugada h3 py-2 titulo-exterior"></p>
											</td>
										</tr>
									</table>
								</div>
								<div class="col-12 mt-3">
									<button class="btn btn-block btn-primary" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">Cerrar</span></button>
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
	<!-- SCRIPTS PROPIOS -->
	<script>
		$(document).ready(function(){
			buscarJugadas($('#codigo').val(), $('#fecha').val(), $('#estado').val());
			$('#codigo').keyup(function(){
				buscarJugadas($('#codigo').val(), $('#fecha').val(), $('#estado').val());
			});
			$('#codigo').on('change', function(){
				buscarJugadas($('#codigo').val(), $('#fecha').val(), $('#estado').val());
			});
			$('#fecha').on('change', function(){
				buscarJugadas($('#codigo').val(), $('#fecha').val(), $('#estado').val());
			});
			$('#estado').on('change', function(){
				buscarJugadas($('#codigo').val(), $('#fecha').val(), $('#estado').val());
			});
			ultimaJugada();			
			// TRAER JUGADAS
			function buscarJugadas(codigo, fecha, estado){
				$.ajax({
					url: 'buscarJugadas.php',
					type: 'POST',
					dataType: 'html',
					data: {codigo: codigo, fecha: fecha, estado: estado},
				})
				.done(function(respuesta){
					if (respuesta == 'Error') {
						console.log('Error: ' + respuesta);
					}  else {
						$('#tbody').html(respuesta);
					}
					$('.btnSearch').on('click', function(){
						traerJugadaInd($(this).attr('id'));
					});
				})
				.fail(function(){
					console.log('error');
				});
			}
			// TARER FECHA LIMITE
			function traerFecha(){
				$.ajax({
					url: 'buscarJugadas.php',
					type: 'POST',
					dataType: 'html',
					// data: {jugada_1: jugada_1},
				})
				.done(function(respuesta){
					if (respuesta == 'Error') {
						console.log('Error: ' + respuesta);
					}  else {
						$('#tbody').html(respuesta);
					}
				})
				.fail(function(){
					console.log('error');
				});
			}
			// TRAER ULTIMA JUGADA
			function ultimaJugada(){
				$.ajax({
					url: 'ultimaJugada.php',
					type: 'POST',
					dataType: 'html',
					// data: {jugada_1: jugada_1},
				})
				.done(function(respuesta){
					if (respuesta == 'Error') {
						console.log('Error: ' + respuesta);
					}  else {
						$('#traerJugada').html(respuesta);
					}
				})
				.fail(function(){
					console.log('error');
				});
			}
			// TRAER DATOS DE JUGADA
			function traerJugadaInd(jugada){
				$.ajax({
					url: 'traerJugada.php',
					type: 'POST',
					dataType: 'html',
					data: {jugada: jugada},
				})
				.done(function(respuesta){
					var datos = JSON.parse(respuesta);
					if (respuesta == 'Error') {
						console.log('Error: ' + respuesta);
					}  else {
						$('#cident').text(datos['pago']);
						$('#fechaJug').text(datos['fechaUp']);
						$('#esjug').text(datos['estado']);
						$('.1').text(datos['jugada_1']);
						$('.2').text(datos['jugada_2']);
						$('.3').text(datos['jugada_3']);
						$('.4').text(datos['jugada_4']);
						$('.5').text(datos['jugada_5']);
						$('.6').text(datos['jugada_6']);
						$('#actModJA').click();
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