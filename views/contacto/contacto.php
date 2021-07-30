<!DOCTYPE html>
<html lang="es">
<head>
	<!-- META -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- LINK -->
	<link rel="stylesheet" href="../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/SI/estilos-principal.css">
	<!-- FAVICON -->
	<link rel="shortcut icon" href="../../img/logo.png">
	<!-- TITULO -->
	<title>Fenabocol ORG</title>
</head>
<body>
	<!-- HEADER - MENU SUPERIOR -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top menu-superior">
		<div class="container">
			<!-- NOMBRE Y LOGO -->
			<a class="navbar-brand text-white nmlog" href="#">
				<img src="../../img/logo.png" class="img-logo-menu"> <span class="tit-mnu-fbc">Fenabocol ORG</span>
			</a>
			<!-- BTN EXPAND LG -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Navegación de palanca">
				<span class="navbar-toggler-icon text-white"></span>
			</button>
			<!-- OPCIONES DE MENU -->
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<!-- INICIO -->
					<li class="nav-item active">
						<a class="nav-link text-white" href="../../index.php">Inicio</a>
					</li>
					<!-- DONACIONES -->
					<li class="nav-item">
						<a class="nav-link text-white" href="../donaciones/donaciones.php">Donaciones</a>
					</li>
					<!-- SERVICIOS -->
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle text-white" href="" id="navbarServicios" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>
						<div class="dropdown-menu" aria-labelledby="navbarServicios">
							<a class="dropdown-item" href="../servicios/productos.php">Productos</a>
							<a class="dropdown-item" href="../servicios/bomberitos.php">Bomberitos</a>
							<a class="dropdown-item" href="../servicios/programa-ambiental.php">Programa ambiental</a>
							<a class="dropdown-item" href="../servicios/eventos.php">Eventos</a>
						</div>
					</li>
					<!-- CONTACTO -->
					<li class="nav-item">
						<a class="nav-link text-white" href="contacto.php">Contacto</a>
					</li>
					<!-- GANACOL -->
					<li class="nav-item">
						<a class="nav-link text-white" href="../ganacol/ganacol.php">Ganacol</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- CONTENEDOR -->
	<div class="container-fluid mb-5 contenedor-principal">
		<div class="row">
			<!-- CONTENIDO PRINCIPAL -->
			<div class="col-12 col-md-8 contenido-principal">
				<!-- SERVICIOS -->
				<div class="card contenedor-info">
					<div class="card-body">
						<h1 class="titulo">Contactanos</h1>
						<hr>
						<form action="" method="POST" class="form-contact" id="form_contact">
							<div class="form-group">
								<label for="nombre">Nombres*</label>
								<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres" required="true" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="correo">Correo*</label>
								<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required="true" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="celular">Celular*</label>
								<input type="number" class="form-control" id="celular" name="celular" placeholder="Celular" required="true" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="mensaje">Dejanos tu mensaje*</label>
								<textarea class="form-control" id="mensaje" name="mensaje" placeholder="Dejanos tu mensaje" required="true" autocomplete="off"></textarea>
							</div>
							<button type="submit" class="btn btn-block btn-enviar" id="enviar" name="enviar">Enviar</button>
							<div class="card mt-3 p-3">
								<h2 class="card-title text-center titulo">Vinculate con nosotros</h2>
								<p class="card-text">Si quieres vincularte con nosotros es muy sencillo, solo da click en el boton que esta debajo, llena el formulario y envialo al correo: <strong>fenabocolorg@gmail.com</strong> asi de facil entraras en el proceso de vinculación con nosotros</p>
								<a href="../../archivos/SOLICITUD DE INGRESO.docx" target="principal" class="btn btn-block btn-info" id="ingresa_cn" name="ingresa_cn">Formulario de Vinculacion</a>
								<iframe width="0" height="0" src="" frameborder="0" title="principal"></iframe>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- CONTENIDO LATERAL -->
			<div class="col-12 col-md-4 contenido-lateral">
				<!-- LIDER DE FENABOCOL -->
				<div class="card contenedor-info">
					<div class="card-body">
						<h2 class="sub-titulo titulo-fenabocol">Fenabocol ORG</h2>
						<div class="row">
							<div class="col-12 inf-lider-fenabocol">
								<img src="../../img/lider-fenabocol.jpg" alt="" class="img-lider-fenabocol">
							</div>
							<div class="col-12 card-text text-center">
								<strong>Edgar Arturo Fajardo Bernal</strong> <br>
								<strong>Fundador y Presidente de FENABOCOL</strong> <br>
								<small>Fundación el 1 de octubre de 2003
									La Federación Nacional de Bomberos de Colombia tiene como objetivo, la integración de los
									Bomberos Voluntarios y Oficiales, y el fortalecimiento Institucional de los Cuerpos de Bomberos
									del sistema Nacional. Para un mejor desempeño y cubrimiento de la. Gestión del riego en él; país</small>
							</div>
						</div>
					</div>
				</div>
				<!-- CARD -->
				<div class="card contenedor-info">
					<div class="card-body p-1">
						<iframe width="100%" class="video-principal-lateral" src="https://www.youtube.com/embed/qh73qX4TD_k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<h3 class="h5 text-center text-info">Medio Ambiente</h3>
				</div>
				<div class="card contenedor-info">
					<div class="card-body p-1">
						<iframe width="100%" class="video-lateral" src="https://www.youtube.com/embed/Bs-8_wG2qMI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<h3 class="h5 text-center text-info">Desastres Naturales</h3>
				</div>
				<div class="card contenedor-info">
					<div class="card-body p-1">
						<iframe width="100%" class="video-lateral" src="https://www.youtube.com/embed/-BdE8BKdF_U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<h3 class="h5 text-center text-info">!!Bingo Ganacol!!</h3>
				</div>
				<div class="card contenedor-info">
					<div class="card-body p-1">
						<iframe width="100%" class="video-lateral" src="https://www.youtube.com/embed/7T8MioEbjjo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<h3 class="h5 text-center text-info">Himno de los Bomberos</h3>
				</div>
				<div class="card contenedor-info">
					<div class="card-body p-1">
						<iframe width="100%" class="video-lateral" src="https://www.youtube.com/embed/k35sDitSDqg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
					<h3 class="h5 text-center text-info">!!Bingo Ganacol!!</h3>
				</div>
			</div>
		</div>
	</div>
	<!-- FOOTER -->
	<footer class="container-fluid py-3">
		<div class="row foot-info">
			<div class="col-12 col-sm-6 col-md-4">
				<p class="text-white">
					<ul class="text-white">
						<li>Fuente de Informacion: Junta Coordinadora</li>
						<li>Guionista: Edgar Arturo Fajardo Bernal</li>
						<li>Celular: 300 2910614</li>
						<li>Telefono: 4536859</li>
					</ul>
				</p>
			</div>
			<div class="col-12 col-sm-6 col-md-4 mid-foot">
				<p class="text-white">
					<ul class="text-white">
						<li>Viculate a nosotros</li>
						<li>Inscribete ya!, Para personas altruistas como usted que propenden por el bienestar y la seguridad de todos los colombianos</li>
						<li>Inscribete en: febocol@yahoo.com</li>
						<li>Celular: 300 2910614</li>
						<li>Facebook: <a target="_blank" href="https://www.facebook.com/FederacionNacionalDeBomberosDeColombia/?__tn__=%2Cd%2CP-R&eid=ARBjTSf_MhtUzhpHqqtwWr8rLVkR0surw7egIoMfiubDkHD_T3jjpXWI0nr5-DnPvaSVFM_ZUe7ooYT0">Fenabocol</a></li>
					</ul>
				</p>
			</div>
			<div class="col-12 col-md-4">
				<p class="text-white">
					<ul class="text-white">
						<li>Ubicación</li>
						<li>Ciudad: Bogota D.C.</li>
						<li>Dirección: Calle 43a sur #78g - 28</li>
						<li>Barrio: Onasis</li>
					</ul>
				</p>
			</div>
		</div>
		<hr>
		<div class="row d-flex justify-content-around">
			<div class="col-3 col-md-1">
				<img src="../../img/escudo-de-colombia.png" alt="" class="w-100">
			</div>
			<div class="col-3 col-md-1">
				<img src="../../img/significado-del-escudo-de-colombia.png" alt="" class="w-100">
			</div>
			<div class="col-3 col-md-1">
				<img src="../../img/logo.png" alt="" class="w-100">
			</div>
			<div class="col-3 col-md-1">
				<img src="../../img/man-156557_1280.png" alt="" class="w-100">
			</div>
		</div>
	</footer>
	<!-- SCRIPTS BOOTSTRAP -->
	<script src="../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../js/Bootstrap/popper.min.js"></script>
	<script src="../../js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS PROPIOS -->
	<script>
		$(document).ready(function(){
			$('.contenedor-principal').css({
				'padding-top' : ($('.menu-superior').height() + 30) + 'px'
			});
			$('.img-lider-fenabocol').height($('.img-lider-fenabocol').width());

			$('#enviar').on('click', function(e){
				e.preventDefault();
				enviarCorreo($('#nombre').val(), $('#correo').val(), $('#celular').val(), $('#mensaje').val());
			});

			function enviarCorreo(nombre, correo, celular, mensaje){
				alert('HW');
				$.ajax({
					url: '../../SI/index/enviarCorreo.php',
					type: 'POST',
					dataType: 'html',
					data: {nombre: nombre, correo: correo, celular: celular, mensaje: mensaje},
				})
				.done(function(respuesta){
					if (respuesta == 'Exito') {
						alert('Mensaje Enviado Exitosamente');
					} else if (respuesta == 'Errorenvio') {
						alert('Algo ha salido mal error de envio' + respuesta);
					} else if (respuesta == 'Errordatos') {
						alert('Algo ha salido mal error de datos');
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