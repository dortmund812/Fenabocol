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
		.tit-mnu-fbc{
				font-size: 1rem;
			}
		@media screen and (max-width: 400px) {
			.tit-mnu-fbc{
				font-size: 1rem;
			}
		}
	</style>
	<!-- HEADER - MENU SUPERIOR -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top menu-superior">
		<div class="container">
			<!-- NOMBRE Y LOGO -->
			<a class="navbar-brand text-white nmlog" href="#">
				<img src="../../img/logo.png" class="img-logo-menu"> <span class="tit-mnu-fbc" style="font-size: 1.5rem">Fenabocol ORG</span>
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
				<!-- DONACIONES -->
				<div class="card contenedor-info">
					<div class="card-body">
						<h1 class="titulo">Donaciones</h1>
						<hr>
						<p class="card-text">
							Pueddes ayudar a los bomberos de nuestro pais mediante una donacion a <strong>Fenabocol</strong>, tu donacion ayudara a conseguir nuevos y mejores equipos que ayudaran a nuestros bomberos a cumplir si misión con honor.
						</p>
						<h2 class="text-center">Cuenta de ahorros: Banco Pichincha</h2>
						<h3 class="text-center">Numero de cuenta: 410725193</h3>
						<h4 class="text-center mb-5">Fenabocol</h4>
						<!-- LISTA DE BANCOS -->
						<div class="row donaciones-content">
							<!-- BANCO AV VILLAS -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.avvillas.com.co/wps/portal/avvillas/banco/banca-personal/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8zifQIszTwsTQx8LAJ8LAwcQz28PMz8XYyDQwz0wwkpiAJKG-AAjiD9UWAluEzwMIUqwGOGl35Uek5-EsS5jnlJxhbp-lFFqWmpRalFeqVFQOGMkpKCYitVA1WD8vJyvfT8_PScVL3k_FxVA2xaMvKLS_QjUFXqF-RGGGSZ5pT5OCoqAgBJF_gW/dz/d5/L2dBISEvZ0FBIS9nQSEh/" id="">
									<div class="img-banco">
										<img src="../../img/Av-Villas-en-Santa-Marta.jpg" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
							<!-- BANCO BBVA -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.bbva.com.co/" id="">
									<div class="img-banco">
										<img src="../../img/banco-bbva.jpg" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
							<!-- BANCO CAJA SOCIAL -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.bancocajasocial.com/?gclid=EAIaIQobChMI57-qnuvA5wIVFJSzCh15ZwKGEAAYASAAEgLFJvD_BwE" id="">
									<div class="img-banco">
										<img src="../../img/BANCO-CAJA-SOCIAL.png" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
							<!-- BANCO COLPATRIA -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.scotiabankcolpatria.com/" id="">
									<div class="img-banco">
										<img src="../../img/banco-colpatria.png" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
							<!-- BANCO DE BOGOTA -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.bancodebogota.com/wps/portal/banco-de-bogota/bogota" id="">
									<div class="img-banco">
										<img src="../../img/bancodbogota.jpg" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
							<!-- BANCO DE OCCIDENTE -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.bancodeoccidente.com.co/wps/portal/banco-de-occidente/bancodeoccidente/" id="">
									<div class="img-banco">
										<img src="../../img/Banco-de-occidente.png" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
							<!-- BANCOLOMBIA -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.grupobancolombia.com/wps/portal/personas" id="">
									<div class="img-banco">
										<img src="../../img/Bancolombia-1.png" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
							<!-- BANCO PICHINCHA -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.bancopichincha.com.co/web/personas" id="">
									<div class="img-banco">
										<img src="../../img/banco-pichincha.jpg.png" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
							<!-- BANCO POPULAR -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.bancopopular.com.co/wps/portal/bancopopular/inicio/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziA_xNTQy9TYz8DNxdnA0CDULNPN2NQozMHA31wwkpiAJKG-AAjgZA_VGElHjpR6Xn5CdBXOOYl2Rska4fVZSallqUWqRXWgQUzigpKSi2UjVQNSgvL9dLz89Pz0nVS87PVTXApiUjv7hEPwJVpX5BboSBblRSZbmjoiIAJOq70A!!/dz/d5/L2dBISEvZ0FBIS9nQSEh/" id="">
									<div class="img-banco">
										<img src="../../img/banco-popular.png" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
							<!-- BANCO DAVIVIENDA -->
							<div class="col-6 col-md-4 col-lg-3 mb-3">
								<a target="_blank" href="https://www.davivienda.com/wps/portal/personas/nuevo" id="">
									<div class="img-banco">
										<img src="../../img/davivienda-b-01.jpg.png" alt="" class="w-100 img-dn-banco">
									</div>
								</a>
							</div>
						</div>
						<!-- IMG DONCAION -->
						<div class="row">
							<div class="col-12">
								<img src="../../img/1494716187.jpg" alt="" class="w-100 img-donacion">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- CONTENIDO LATERAL -->
			<div class="col-12 col-md-4 contenido-lateral">
				<!-- FIRMATON -->
				<div class="card contenedor-info">
					<div class="card-body p-1">
						<p class="card-text text-center">Bogotá, por norma Internacional debe tener 10.000 Bomberos en este Momento tiene 695 Fenabocol.org propone Colocar 10.000 Bomberos para la ciudad de Bogotá D.C con FENABOCOL ya que la ciudad lo requiere. </p> 
						<a target="_blank" class="d-block text-center text-info h3" href="https://www.change.org/p/presidente-iv%C3%A1n-duque-y-alcaldesa-claudia-lopez-si-fenabocol-m%C3%A1s-bomberos-para-bogot%C3%A1-d-c?recruiter=925572540&utm_source=share_petition&utm_medium=facebook&utm_campaign=share_petition&utm_term=9e05e0e58b144473bfcfefb6cea2d7a4&recruited_by_id=1bff0f20-0a07-11e9-82ea-b3f993519859&utm_content=starter_fb_share_content_es-419%3Av2"> Firma Aquí </a> <p class="card-text text-center">Fenabocol ORG Agradece su respaldo a esta importante iniciativa en favor de toda la población Bogotá.</p>
					</div>
					<h3 class="h5 text-center text-info">Firmaton !Si Fenabocol, Mas bomberos para Bogotá!</h3>
				</div>
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
						<iframe width="100%" class="video-lateral" src="https://www.youtube.com/embed/qh73qX4TD_k" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
					<h3 class="h5 text-center text-info">!!Loto Ganacol!!</h3>
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
					<h3 class="h5 text-center text-info">!!Loto Ganacol!!</h3>
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
			$('.img-dn-banco').height(($('.img-dn-banco').width()/2.2));
		});
	</script>
</body>
</html>