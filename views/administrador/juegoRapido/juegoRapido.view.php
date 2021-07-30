<?php if (!empty($_SESSION)&&$_SESSION['jugador'] == 'fenabocolorg@gmail.com') {} else {die('Error usuario no autorizado');} ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../../css/SI/estilos-principal.css">
	<link rel="stylesheet" href="../../../css/Icomoon/style.css">
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css"/>
	<!-- TITULO -->
	<title>Juego Rapido</title>
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
	</style>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<table class="table table-striped table-responsive-md w-100" id="tableData">
					<thead>
						<tr class="bg-danger text-white text-center">
							<th>Codigo</th>
							<th>Juego</th>
							<th>Estado</th>
							<th>Aciertos</th>
							<th>Fecha</th>
							<th><i class="icon-cog"></i></th>
						</tr>
					</thead>
					<tbody class="text-center titulo-exterior" id="tbody">
						<!-- JUGADAS -->
						<?php echo $tbody ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- MODAL INFO -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Información</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h3 class="text-center titulo-exterior mb-0">Jugada</h3>
					<div class="contenedor-balotas">
						<span class="balota" id="balota1" data-info='B'></span>
						<span class="balota" id="balota2" data-info='I'></span>
						<span class="balota" id="balota3" data-info='N'></span>
						<span class="balota" id="balota4" data-info='G'></span>
						<span class="balota" id="balota5" data-info='O'></span>
						<span class="balota" id="balota6" data-info='!'></span>
					</div>
					<h3 class="text-center titulo-exterior mb-0 mt-2">Resultado</h3>
					<div class="contenedor-balotas">
						<span class="balota" id="resultado1" data-info='-'></span>
						<span class="balota" id="resultado2" data-info='-'></span>
						<span class="balota" id="resultado3" data-info='-'></span>
						<span class="balota" id="resultado4" data-info='-'></span>
						<span class="balota" id="resultado5" data-info='-'></span>
						<span class="balota" id="resultado6" data-info='-'></span>
					</div>
					<h3 class="text-center titulo-exterior mb-0 mt-2">Pago</h3>
					<table class="mb-0 table table-striped table-bordered text-center titulo-exterior table-sm">
						<tbody>
							<tr>
								<td>Voluntario</td>
								<td id="voluntarioJuego">nombre</td>
							</tr>
							<tr>
								<td>Tipo</td>
								<td id="tipoJuego">Tipo</td>
							</tr>
							<tr>
								<td>Donador</td>
								<td id="donadorJuego">nombre</td>
							</tr>
							<tr>
								<td>Estado</td>
								<td id="estadoJuego">nombre</td>
							</tr>
							<tr>
								<td>Fecha</td>
								<td id="fechaJuego">12/Enero/2021</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>
	<script src="../../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../../js/Bootstrap/popper.min.js"></script>
	<script src="../../../js/Bootstrap/bootstrap.min.js"></script>
	<!-- DATA TABLES -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
	<script>
		var tabla = $('#tableData').DataTable({
			responsive: 'true',
			dom: 'Bfrtilp',
			buttons:[
				{
					extend: 'excelHtml5',
					text: 'Excel',
					titleAttr: 'Exportar a Excel',
					className: 'btn btn-success mr-1'
				},
				{
					extend: 'pdfHtml5',
					text: 'PDF',
					titleAttr: 'Exportar a Pdf',
					className: 'btn btn-danger mr-1'
				},
				{
					extend: 'print',
					text: 'Imprimir',
					titleAttr: 'Imprimir',
					className: 'btn btn-primary mr-1'
				}
			]
		});
		$('.btnDetalles').on('click', function(e){
			e.preventDefault();
			$.ajax({
				url: 'traerDatos.php',
				type: 'POST',
				dataType: 'json',
				data: {codigo: $(this).attr('id')},
			})
			.done(function(response){
				$(response[0]).each(function(indice,elemento){
					$('#balota'+(indice+1)).attr('data-info',elemento);
				});

				$(response[1]).each(function(indice,elemento){
					$('#resultado'+(indice+1)).attr('data-info',elemento);
				});

				$('#voluntarioJuego').text(response[2][0]);
				$('#tipoJuego').text(response[2][1]);
				$('#donadorJuego').text(response[2][2]);
				$('#estadoJuego').text(response[2][3]);
				$('#fechaJuego').text(response[2][4]);
			})
			.fail(function(response){
				$('#pre-loader').removeClass('active');
				console.log('Error: '+response);
			});
		});
	</script>
</body>
</html>