<?php if (!empty($_SESSION['jugador'])&&$_SESSION['rol'] == 'donante') {} else {die('Error usuario no autorizado');} ?>
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
	<!-- DATATABLES -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css"/>
	<!-- FAVICON -->
	<link rel="shortcut icon" href="../../../img/logo.png">
	<!-- TITULO -->
	<title>Fenabocol ORG</title>
</head>
<body>
	<style>
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
	</style>
	<!-- LOADER ESPERA -->
	<div class="pre-loader" id="pre-loader">
		<div class="loaderEsp"></div>
	</div>
	<!-- CONTAINER -->
	<div class="container-fluid my-3 contenedor-principal">
		<div class="row">
			<div class="col-12 col-md-4">
				<form action="" class="card card-body row">
					<h2 class="titulo-exterior text-center">Datos</h2>
					<div class="form-group col-12">
						<label for="cantidad">Cantidad Jugadas*</label>
						<input type="number" name="cantidad" id="cantidad" class="form-control">
					</div>
					<div class="form-group col-12">
						<label for="nombre">Nombre Jugadas*</label>
						<input type="text" name="nombre" id="nombre" class="form-control" autocomplete="off">
					</div>
					<div class="col-12">
						<button class="btn btn-primary btn-block" id="creJug">Crear Jugadas</button>
					</div>
				</form>
			</div>
			<div class="col-12 col-md-8">
				<div class="card card-body">
					<table id="tableData" class="text-center w-100">
						<thead>
							<tr>
								<th>Codigo</th>
								<th>Nombre</th>
								<th>Estado</th>
								<th>Fecha</th>
							</tr>
						</thead>
						<tbody></tbody>
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
	<!-- SCRIPTS BOOTSTRAP -->
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
		$(document).ready(function(){
			var tabla = $('#tableData').DataTable({
				ajax: {
					url: 'crearJugadasJuego.php',
					method: 'POST',
					data:{cantidad: function() { return $('#cantidad').val() },
						nombre: function() { return $('#nombre').val() }},
					dataSrc: ''
				},
				columns: [
					{data:"codigo"},
					{data:"nombreCliente"},
					{data:"estado"},
					{data:"fechaCrea"}
				],
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
			// DATA TABLE AJAX
			$('#creJug').on('click',function(e){
				e.preventDefault();
				if($('#cantidad').val() != '' && $('#nombre').val() != '' && $('#cantidad').val() >= 1){
					tabla.ajax.reload();
				} else {
					alertMessage('error','Error','Complete correctamente los datos');
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
		});
	</script>
</body>
</html>