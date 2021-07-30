<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/Icomoon/style.css">
	<link rel="stylesheet" href="../../../css/SI/estilos-principal.css">
	<title>Asignar Jugadas</title>
</head>
<body>
	<div class="container-fluid pb-3">
		<div class="row">
			<div class="col-12">
				<div class="card p-2 my-3 contenedor-info">
					<h1 class="card-title text-center titulo-exterior">Jugadas Ganadoras</h1>
				</div>
			</div>
			<table class="col-12 table table-striped table-responsive-md mt-3">
				<thead>
					<tr class="bg-danger text-white text-center">
						<th>ID</th>
						<th>Jugada 1</th>
						<th>Jugada 2</th>
						<th>Jugada 3</th>
						<th>Jugada 4</th>
						<th>Jugada 5</th>
						<th>Jugada 6</th>
						<th>Fecha</th>
						<th>Ganadores</th>
					</tr>
				</thead>
				<tbody class="text-center titulo-exterior" id="tbody">
					<!-- JUGADAS -->
					<tr class="text-center">
						<td colspan="8">No hay Jugadas</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<script src="../../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../../js/Bootstrap/popper.min.js"></script>
	<script src="../../../js/Bootstrap/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			traerJugadas();
			function traerJugadas(){
				$.ajax({
					url: 'traerJugadas.php',
					type: 'POST',
					dataType: 'html',
					// data: {cantidad: cantidad},
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
		});
	</script>
</body>
</html>