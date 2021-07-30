
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
					<h1 class="card-title text-center titulo-exterior">Asignar Jugadas</h1>
				</div>
			</div>
			<form action="descargarJugadas.php" class="col-12" id="formulario_dw" method="POST">
				<div class="form-group">
					<input type="text" class="form-control" name="documento" id="documento" placeholder="Nombre del Documento">
				</div>
				<div class="input-group">
					<input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Ingresar cantidad de jugadas" autocomplete="off">
					<div class="input-group-append">
						<button class="btn btn-primary" id="agregar_jugadas">Crear</button>
					</div>
					<div class="input-group-append">
						<input type="text" autocomplete="off" name="json" id="json" style="width: -1px;height: -1px;position: absolute;top: 0;left: 0;opacity: 0;z-index: -100;">
						<input type="submit" value="Descargar" class="btn btn-success disabled" id="agregar_excel" disabled="true">
					</div>
				</div>
			</form>
			<table class="col-12 table table-striped table-responsive-md mt-3">
				<thead>
					<tr class="bg-danger text-white text-center">
						<th>ID</th>
						<th>codigo</th>
						<th>Valor</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody class="text-center titulo-exterior" id="tbody">
					<!-- JUGADAS -->
					<tr class="text-center">
						<td colspan="4">No hay Jugadas</td>
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
			$('#agregar_jugadas').on('click', function(e){
				e.preventDefault();
				if ($('#cantidad').val() > 0 && $('#documento').val() != '') {
					agregarJugadas($('#cantidad').val());
				} else {
					alert('Complete todos los datos para continuar.');
				}
			});
			$('#agregar_excel').on('click', function(e){
				if ($('#cantidad').val() > 0 && $('#documento').val() != '') {
					$('#cantidad').val('');
					$('#documento').val('');
				} else {
					e.preventDefault();
					alert('Complete todos los datos para continuar.');
				}
			});
			function agregarJugadas(cantidad){
				$.ajax({
					url: 'crearJugadas.php',
					type: 'POST',
					dataType: 'html',
					data: {cantidad: cantidad},
				})
				.done(function(respuesta){
					if (respuesta == 'Error') {
						console.log('Error: ' + respuesta);
					}  else {
						$('#agregar_excel').removeClass('disabled');
						$('#agregar_excel').prop('disabled', false);
						$('#tbody').html(respuesta);
						$('#json').val(guardarDat());
					}
				})
				.fail(function(){
					console.log('error');
				});
			}

			function tabla(tituloDoc){
				var data = [];
				var titulo = tituloDoc;

				$('#tbody>tr').each(function(indice, elemento){
					var tablaId = $('#tbody>tr:nth-child('+(indice+1)+')>td:nth-child(1)').text();
					var tablaCodigo = $('#tbody>tr:nth-child('+(indice+1)+')>td:nth-child(2)').text();
					var tablaValor = $('#tbody>tr:nth-child('+(indice+1)+')>td:nth-child(3)').text();
					var tablaEstado = $('#tbody>tr:nth-child('+(indice+1)+')>td:nth-child(4)').text();

					data.push(
						{'ID':tablaId,'codigo':tablaCodigo,'valor':tablaValor,'estado':tablaEstado}
					);
				});

				var jugadasAlm = {"titulo":titulo, "data":data};
				return jugadasAlm;
			}
			function guardarDat(){
				var json = JSON.stringify(tabla($('#documento').val()));
				return json;
			}
		});
	</script>
</body>
</html>