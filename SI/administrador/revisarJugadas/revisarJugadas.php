<?php if (!empty($_SESSION)&&$_SESSION['jugador'] == 'fenabocolorg@gmail.com') {} else {die('Error usuario no autorizado');} ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/SI/estilos-principal.css">
	<title>Mis Jugadas</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 pt-2">
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
			</div>
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
					</tr>
				</thead>
				<tbody class="text-center titulo-exterior" id="tbody">
					<!-- JUGADAS -->
				</tbody>
			</table>
		</div>
	</div>
	<script src="../../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../../js/Bootstrap/popper.min.js"></script>
	<script src="../../../js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS PROPIOS -->
	<script>
		$(document).ready(function(){
			// BUSCAR JUGADA
			buscarJugadas($('#codigo').val(), $('#fecha').val(), $('#estado').val());
			$('#codigo').on('keyup', function(){
				buscarJugadas($('#codigo').val(), $('#fecha').val(), $('#estado').val());
			});
			$('#fecha').on('change', function(){
				buscarJugadas($('#codigo').val(), $('#fecha').val(), $('#estado').val());
			});
			$('#estado').on('change', function(){
				buscarJugadas($('#codigo').val(), $('#fecha').val(), $('#estado').val());
			});
			function buscarJugadas(codigo, fecha, estado){
				$.ajax({
					url: 'traerJugadas.php',
					type: 'POST',
					dataType: 'html',
					data: {codigo: codigo, fecha: fecha, estado: estado},
				})
				.done(function(respuesta){
					if (respuesta == 'Error') {
						console.log('Error: ' + respuesta);
					}  else {
						$('#tbody').html(respuesta);
						$('.btn-modificar').on('click', function(e){
							e.preventDefault();
							aprobarJugada($(this).prop('id'));
						});
					}
				})
				.fail(function(){
					console.log('error');
				});
			}
			function aprobarJugada(jugada){
				$.ajax({
					url: 'aprobarJugada.php',
					type: 'POST',
					dataType: 'html',
					data: {jugada: jugada},
				})
				.done(function(respuesta){
					if (respuesta == 'Error') {
						console.log('Error: ' + respuesta);
					}  else {
						console.log(respuesta);
						buscarJugadas('');
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