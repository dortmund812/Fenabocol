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
	<style>
		.modal-practica{
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background: rgba(0,0,0,.3);
			display: flex;
			justify-content: center;
			align-items: center;
			z-index: 5000;
		}
		.modal-p-int{
			width: 93%;
			max-height: 93%;
			background: #fff;
			border-radius: 10px;
			padding: 10px;
			box-shadow: 0px 0px 15px #262626;
			overflow: hidden;
		}
		.sup-modal-prc{
			width: 100%;
			display: flex;
			justify-content: space-around;
		}
		.img-mod-prac{
			max-width: 200px;
			max-height: 200px;
		}
		.sup-modal-prc .cont-jug-g-mod,
		.jug-int-mod-prc .cont-jug-g-mod{
			display: flex;
			align-items: center;
			text-transform: uppercase;
		}
		.sup-modal-prc .cont-jug-g-mod .jug-g-mod-p,
		.jug-int-mod-prc .cont-jug-g-mod .jug-g-mod-p{
			width: 100px;
			height: 100px;
			background: #fff;
			border: 3px solid #262626;
			border-radius: 50%;
			margin: 0px 5px;
			display: flex;
			justify-content: center;
			align-items: center;
			font-size: 2.5rem;
			box-shadow: inset -5px -3px 5px #262626;
			transition: .5s;
		}
		.jug-int-mod-prc .cont-jug-g-mod .jug-g-mod-p{
			outline: none;
			text-align: center;
			line-height: 0px;
			margin: 0 5px;
			padding: 0;
			text-transform: uppercase;
		}
		.jug-int-mod-prc{
			display: flex;
			align-items: center;
		}
		.jugadas-ing-mod-prc{
			display: flex;
			justify-content: space-around;
			/*border: 1px solid #262626;*/
		}
		.jug-int-mod-prc .cont-jug-g-mod{
			border: 2px solid #262626;
			padding: 5px;
			border-radius: 5px;
		}
		.tit-mod-prc{
			display: flex;
			justify-content: space-between;
		}
		.tit-mod-prc .img-logo-menu{
			width: 40px;
		}
		.tit-mod-prc .tit-mnu-fbc{
			font-size: 1.5rem;
		}
		.log-img-mod{
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		#ingModPrac,
		.close-mod-prc{
			cursor: pointer;
		}
		@media (max-width: 1000px){
			.img-mod-prac{
				max-width: 150px;
				max-height: 150px;
			}
			.sup-modal-prc .cont-jug-g-mod .jug-g-mod-p,
			.jug-int-mod-prc .cont-jug-g-mod .jug-g-mod-p{
				width: 80px;
				height: 80px;
			}
		}
		@media (max-width: 800px){
			.img-mod-prac{
				max-width: 150px;
				max-height: 150px;
			}
			.sup-modal-prc .cont-jug-g-mod .jug-g-mod-p,
			.jug-int-mod-prc .cont-jug-g-mod .jug-g-mod-p{
				width: 80px;
				height: 80px;
			}
			.info-mod-prc,
			.img-mod-prac{
				display: none;
			}
		}
		@media (max-width: 740px){
			.modal-practica,
			#ingModPrac{
				display: none;
			}
		}
	</style>
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
						<a class="nav-link text-white" href="../contacto/contacto.php">Contacto</a>
					</li>
					<!-- GANACOL -->
					<li class="nav-item">
						<a class="nav-link text-white" href="ganacol.php">Ganacol</a>
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
				<!-- GANACOL -->
				<div class="card contenedor-info">
					<div class="card-body">
						<h1 class="titulo">Ganacol</h1>
						<hr>
						<p class="card-text mb-2">
							Estamos trabajando en el loto bomberil <strong>Ganacol</strong>, que aportara importantes recursos para los bomberos de colombia.
						</p>
						<p class="card-text mb-4">
							<strong>Agradecemos su danación voluntaria</strong>, gracias a ésta, podremos cumplir nuestro objetivo como entidad de socorro nacional, el cual es promover la seguridad y la debida atención de la gestión del riesgo, salvaguardando la vida ante eventos catastróficos a los que estamos todos expuestos.
						</p>
						<div class="w-100">
							<iframe width="100%" src="https://www.youtube.com/embed/lsVYrLWsocA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" class="video-principal" style="min-height: 400px" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				<!-- INGRESAR AL SISTEMA O REGISTARSE -->
				<div class="card contenedor-info">
					<div class="card-body">
						<h1 class="titulo">Ingresa o Registrate</h1>
						<p class="card-text">Ingresa en el sistema para poder realizar tus jugadas y apuestas, o registrate y participa con nosotros en el bingo <strong>Fenabocol</strong>.</p>
						<p class="card-text">Si no estas registrado es muy sencillo, solo ingresa tu correo, numero de telefono o celular y una contraseña con la que podras ingresar a realizar tus jugadas.</p>
						<p class="card-text">SU DONATIVO ES PARA EL FINANCIAMIENTO DE LOS CUERPOS DE BOMBEROS VOLUNTARIOS DE FENABOCOL</p>
						<h2 class="titulo">POR SU ACIERTO A EL BINGO DE LAS 6 BALOTAS SERA RECOMPENSADO CON $50.000.000</h2>
						<!-- FORMULARIOS -->
						<div class="row">
							<!-- INGRESAR -->
							<div class="col-12 col-md-6 mb-3 mb-md-0">
								<form method="POST" class="h-100 pb-0 card card-body contenedor-info" id="form_ingresar" name="form_ingresar">
									<h2 class="titulo">Ingresar</h2>
									<!-- LOGO -->
									<div class="logo-form d-flex justify-content-center">
										<img src="../../img/logo.png" alt="" class="w-50">
									</div>
									<!-- CORREO -->
									<div class="form-group">
										<label for="ingresar_correo" class="m-0 pl-2">Correo*</label>
										<input type="email" name="ingresar_correo" id="ingresar_correo" class="form-control" placeholder="Correo" required="true" autocomplete="off">
									</div>
									<!-- PASSWORD -->
									<div class="form-group">
										<label for="ingresar_password" class="m-0 pl-2">Contraseña*</label>
										<input type="password" name="ingresar_password" id="ingresar_password" class="form-control" placeholder="Contraseña" required="true" autocomplete="off">
									</div>
									<!-- BOTON INGRESAR -->
									<button type="submit" class="btn btn-block btn-danger text-white text-center" id="ingresar_btn">Ingresar</button>
								</form>
							</div>
							<!-- REGISTARSE -->
							<div class="col-12 col-md-6">
								<form method="POST" class="h-100 card card-body contenedor-info" id="form_registrarse" name="form_registrarse">
									<h2 class="titulo">Registrarse</h2>
									<!-- CORREO -->
									<div class="form-group">
										<label for="registrar_correo" class="m-0 pl-2">Correo*</label>
										<input type="email" name="registrar_correo" id="registrar_correo" class="form-control" placeholder="Correo" required="true" autocomplete="off">
									</div>
									<!-- TELEFONO -->
									<div class="form-group">
										<label for="registrar_telefono" class="m-0 pl-2">Telefono*</label>
										<input type="number" name="registrar_telefono" id="registrar_telefono" class="form-control" placeholder="Telefono" required="true" autocomplete="off">
									</div>
									<!-- PASSWORD -->
									<div class="form-group">
										<label for="registrar_password" class="m-0 pl-2">Contraseña*</label>
										<input type="password" name="registrar_password" id="registrar_password" class="form-control" placeholder="Contraseña" required="true">
									</div>
									<!-- PASSWORD -->
									<div class="form-group">
										<label for="registrar_password_2" class="m-0 pl-2">Repite la Contraseña*</label>
										<input type="password" name="registrar_password_2" id="registrar_password_2" class="form-control" placeholder="Contraseña" required="true">
									</div>
									<!-- BOTON INGRESAR -->
									<button type="submit" class="btn btn-block btn-danger text-white text-center" id="registrarse_btn">Registrarse</button>
								</form>
							</div>
						</div>
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
				<div class="card contenedor-info" id="ingModPrac">
					<div class="card-body p-1">
						<img src="../../img/JBFCA.png" alt="" class="w-100">
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
	<!-- M0DAL DE PRACTICA -->
	<div class="modal-practica" id="modalPrac">
		<div class="modal-p-int">
			<div class="tit-mod-prc">
				<p class="titulo-exterior log-img-mod">
					<img src="../../img/logo.png" class="img-logo-menu"> <span class="tit-mnu-fbc">  Fenabocol ORG</span>
				</p>
				<h2 class="titulo-exterior">Bingo Fenabocol</h2>
				<span class="close-mod-prc">Cerrar X</span>
			</div>
			<div class="sup-modal-prc">
				<img src="../../img/OSIODG1.png" alt="Colombia" class="img-mod-prac">
				<div class="cont-jug-g-mod" id="res-jug-prac">
					<div class="jug-g-mod-p">B</div>
					<div class="jug-g-mod-p">I</div>
					<div class="jug-g-mod-p">N</div>
					<div class="jug-g-mod-p">G</div>
					<div class="jug-g-mod-p">O</div>
					<div class="jug-g-mod-p">!</div>
				</div>
				<img src="../../img/OJXLD71 [Convertido].png" alt="Colombia" class="img-mod-prac">
			</div>
			<div class="inf-modal prc">
				<h2 class="h1 text-center titulo-exterior mt-5">Realiza tu jugada</h2>
				<div class="jugadas-ing-mod-prc">
					<div class="jug-int-mod-prc">
						<div class="cont-jug-g-mod" id="re-jug-prac">
							<input type="text" maxlength="2" class="jug-g-mod-p"></input>
							<input type="text" maxlength="2" class="jug-g-mod-p"></input>
							<input type="text" maxlength="2" class="jug-g-mod-p"></input>
							<input type="text" maxlength="2" class="jug-g-mod-p"></input>
							<input type="text" maxlength="2" class="jug-g-mod-p"></input>
							<input type="text" maxlength="2" class="jug-g-mod-p"></input>
						</div>
					</div>
					<div class="opc-ing-mod-prc">
						<button class="btn btn btn-danger btn-block" id="inc-jug-prac-btn">Iniciar Juego</button>
						<button class="btn btn btn-danger btn-block close-mod-prc">Cerrar</button>
					</div>
				</div>
			</div>
			<div class="info-mod-prc text-center mt-3">
				<small>Bienvenido al bingo Fenabocol, para jugar, porfavor ingrese un numero del 1 al 50 o usando las letras de la palabra B-I-N-G-O en las balotas que se muestran en pantalla, este juego no es valido para reclamar ningun premio y solo sera un juego de practica, si desea jugar al Bingo Fenabocol y ganar un premio porfavor Ingrese con su usuario y contraseña para jugar.</small>
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
						<li>Facebook: <a href="">Fenabocol</a></li>
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
	<audio class="audioFen" id="bienvenido">
		<source src="../../audio/Bienvenido-al-bingo-fenabocol.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="gracias">
		<source src="../../audio/Gracias-por-jugar-con-nosotros.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="complete">
		<source src="../../audio/Porfavor-complete-todas-las-balotas.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="0a">
		<source src="../../audio/0a.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="1a">
		<source src="../../audio/1a.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="2a">
		<source src="../../audio/2a.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="3a">
		<source src="../../audio/3a.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="4a">
		<source src="../../audio/4a.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="5a">
		<source src="../../audio/5a.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="6a">
		<source src="../../audio/6a.mp3" type="audio/mpeg">
	</audio>
	<audio class="audioFen" id="6a">
		<source src="../../audio/6a.mp3" type="audio/mpeg">
	</audio>
	<!-- SCRIPTS BOOTSTRAP -->
	<script src="../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../js/Bootstrap/popper.min.js"></script>
	<script src="../../js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPTS PROPIOS -->
	<script>
		$('#modalPrac').fadeOut(0);
		$(document).ready(function(){			
			//ESTILOS CSS
			$('.contenedor-principal').css({
				'padding-top' : ($('.menu-superior').height() + 30) + 'px'
			});
			$('.img-lider-fenabocol').height($('.img-lider-fenabocol').width());
			// INGRESAR BTN
			$('#ingresar_btn').on('click', function(e){
				if ($('#ingresar_correo').val() != ''
					&& $('#ingresar_password').val() != '') {
					e.preventDefault();
					validarIngreso($('#ingresar_correo').val(), $('#ingresar_password').val());
				}
			});
			// REGISTRARSE BTN
			$('#registrarse_btn').on('click', function(e){
				e.preventDefault();
				validarDatosRegistro($('#registrar_correo').val(), $('#registrar_telefono').val(), $('#registrar_password').val(), $('#registrar_password_2').val());
			});
			function validarIngreso(correo, password){
				$.ajax({
					url: '../../SI/ingreso/ingreso.php',
					type: 'POST',
					dataType: 'html',
					data: {correo: correo, password: password},
				})
				.done(function(respuesta){
					if (respuesta == 'Exito') {
						window.location.href = '../../config/direccion.php';
					} else {
						alert('Datos incorrectos, intenta nuevamente.' + respuesta);
					}
				})
				.fail(function(){
					console.log('error');
				});
			}

			function validarDatosRegistro(correo, telefono, password, password2){
				if (correo != ' '
					&& telefono != ' '
					&& password != ' ') {

					if (password === password2) {
						registrarJugador(correo, telefono, password);
					} else {
						alert('Las contraseñas no coinciden');
					}

				} else {
					alert('Por favor completa todos los campos')
				}
			}

			function registrarJugador(correo, telefono, password){
				$.ajax({
					url: '../../SI/registro/registro.php',
					type: 'POST',
					dataType: 'html',
					data: {correo: correo, telefono: telefono, password: password},
				})
				.done(function(respuesta){
					if (respuesta == 'Exito') {
						window.location.href = '../../SI/bingoFenabocol/bingoFenabocol.php';
					} else if (respuesta == 'ErrorCorreo') {
						alert('El correo ya esta registrado, intente con otro correo.');
					} else {
						alert('Porfavor ingrese todos los datos');
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