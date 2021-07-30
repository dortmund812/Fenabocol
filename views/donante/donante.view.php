<?php if (!empty($_SESSION['jugador'])&&$_SESSION['rol'] == 'donante') {} else {die('Error usuario no autorizado');} ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, 
	minimum-scale=1.0">
	<link rel="stylesheet" href="../../css/Bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/Icomoon/style.css">
	<title>Fenabocol</title>
</head>
<body>
	<style>
		@font-face{
			font-family: titulos;
			src: url(../../Fuentes/X-Heighting.otf);
		}
		@font-face{
			font-family: pruebafuente2;
			src: url(../../Fuentes/Retro-Team.otf);
		}
		body{
			font-size: 16px;
			font-family: sans-serif;
		}
		/*LOADER*/
		.pre-loader{
			display: none;
			position: fixed;
			width: 100%;
			height: 100vh;
			background: rgba(0,0,0,.5);
			z-index: 2;
		}
		.loader{
			position: absolute;
			top: 50%;
			left: 50%;
			border: 5px solid #f3f3f3; /* Light grey */
		    border-top: 5px solid #3498db; /* Blue */
		    border-radius: 50%;
		    width: 50px;
		    height: 50px;
		    animation: spin 2s linear infinite;
		}
		.pre-loader.active {
			display: block;
		}
		@keyframes spin {
		    0% { transform: rotate(0deg); }
		    100% { transform: rotate(360deg); }
		}
		/*---BARRA SUPERIOR ---*/
		.barra-superior{
			background: #A91E1E;
			color: #fff;
			height: 45px;
			display: flex;
			justify-content: flex-end;
			overflow: hidden;
		}
		.barra-superior .notificaciones{
			display: flex;
			justify-content: flex-end;
		}
		.barra-superior .notificaciones i{
			font-size: 25px;
			cursor: pointer;
		}
		.barra-superior .notificaciones .usuario:hover{
			background: rgba(255,255,255,.1);
		}
		.barra-superior .notificaciones .usuario img{
			height: 40px;
			width: 40px;
			border: 1px solid white;
			padding: 0px;
			overflow: hidden;
			border-radius: 50%;
			margin: 0px 10px;
			cursor: pointer;
			background: #fff;
		}
		.barra-superior .notificaciones .usuario a{
			width: 100%;
			color: #fff;
			text-decoration: none;
			line-height: 45px;
			cursor: pointer;
		}
		.barra-superior .notificaciones .salir a:hover{
			text-decoration: none;
			color: #fff;
		}
		.barra-superior .notificaciones .salir i:hover{
			text-shadow: 0 0 10px white;
		}
		.barra-superior .notificaciones .salir a{
			display: flex;
			height: 100%;
			color: #fff;
			align-items: center;
			padding: 0px 15px;
		}
		.barra-superior .notificaciones .notificacion{
			position: relative;
		}
		.barra-superior .notificaciones .notificacion span{
			width: 15px;
			height: 15px;
			font-size: 11px;
			line-height: 15px;
			border-radius: 50%;
			text-align: center;
			position: absolute;
			top: 5px;
			right: 8px;
		}
		/*---BARRA LATERAL---*/
		.barra-lateral{
			background: #A91E1E;
			color: #fff;
			min-width: 250px;
			max-width: 250px;
			min-height: 100vh;
			padding: 0;
			border-right: 1px solid;
			border-color: rgba(255,255,255,.1);
		}
		.barra-lateral a{
			color: #fff;
		}
		/*TITULAR*/
		.barra-lateral .titular{
			width: 100%;
			height: 45px;
			display: flex;
			justify-content: center;
			border-bottom: 1px solid;
			border-color: rgba(255,255,255,.1);
			background: #6B0707;
		}
		.barra-lateral .titular h2{
			padding: 10px 0 0 0;
		}
		/*USUARIO*/
		.barra-lateral .usuario-lateral{
			width: 100%;
			padding: 15px 0px;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			border-bottom: 1px solid rgba(255,255,255,.1);
		}
		.barra-lateral .usuario-lateral h5{
			text-align: center;
			margin: 0;
		}
		.barra-lateral .usuario-lateral p{
			text-align: center;
			margin: 0;
		}
		.barra-lateral .usuario-lateral .imagen-usuario{
			width: 50%;
			border: 2px solid white;
			border-radius: 50%;
			background: #fff;
		}
		/*MENU*/
		.barra-lateral .menu a{
			display: block;
			padding: 20px;
			font-weight: 500;
			border-bottom: 1px solid rgba(255,255,255,.1);
			cursor: pointer;
		}
		.barra-lateral .menu a:hover{
			background: #6B0707;
			text-decoration: none;
		}
		.barra-lateral .menu a i{
			margin-right: 20px;
			font-weight: normal;
		}
		.seleccionado{
			background: #6B0707;
			text-decoration: none;
		}
		/*MAIN*/
		.main{
			padding-top: 40px;
		}
		.main .columna{
			padding-left: 20px;
			padding-right: 5px;
		}
		thead tr{
			background:#275FB6;
			color: white;
		}
		thead tr th{
			text-align: center;
		}
		/*MEDIAQUERIES*/
		@media screen and (max-width: 1300px){
			.barra-lateral{
				min-width: auto;
				max-width: 100%;
			}
			.barra-lateral .usuario-lateral,
			.barra-lateral .titular{
				display: none;
			}
			.barra-lateral .menu a span{
				display: none;
			}
			.barra-lateral .menu a i{
				margin-right: 0;
			}
		}
		@media screen and (max-width: 575px){
			.barra-lateral{
				min-height: auto;
			}
			.barra-lateral .menu a{
				display: inline-block;
				border-bottom: none;
				padding: 15px;
			}
			.main .widget form button{
				width: 100%;
			}
		}
		@media screen and (max-width: 393px){
			.barra-lateral .menu a{
				padding: 15px;
			}
		}
		@media screen and (max-width: 375px){
			.barra-lateral .menu a{
				padding: 10px;
			}
		}
	</style>

	<!-- LOADER -->
	<div class="pre-loader" id="pre-loader">
		<div class="loader"></div>
	</div>
	<!-- CONTAINER -->
	<div class="container-fluid">
		<div class="row">
			<!-- MENU LATERAL IZQUIERDO -->
			<div class="barra-lateral col-12 col-sm-auto">
				<div class="titular">
					<h2 class="titular-h2">Fenabocol</h2>
				</div>
				<div class="usuario-lateral">
					<img class="imagen-usuario img-lateral" src="../../img/logo.png" alt="">
					<div class="descripcion-usuario">
						<h5 class="rol-cliente">Bienvenido</h5>
						<p class="nombre-cliente">!Este es el bingo fenabocol!</p>
					</div>
				</div>
				<nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
					<!-- REGISTAR JUGADAS -->
					<a class="menu-opcion seleccionado" id="registrar_jugadas" target="principal" href="../../SI/donante/crearJugadas/crearJugadas.php">
						<i class="icon-edit"></i><span>Cear Jugadas</span>
					</a>
					<!-- VER JUGADAS -->
					<a class="menu-opcion" id="registrar_jugadas" target="principal" href="../../SI/donante/verJugadas/verJugadas.php">
						<i class="icon-edit"></i><span>Ver Jugadas</span>
					</a>
					<!-- CONFIGURACION -->
					<a class="menu-opcion" id="mis_jugadas" target="principal" href="../../SI/donante/configuracion/configuracion.php">
						<i class="icon-cog"></i><span>Configuración</span>
					</a>
					<!-- SALIR MIN -->
					<a href="../../SI/cerrarSesion/cerrarSesion.php" class="d-block d-sm-none">
						<i class="icon-switch1" id="salir"></i>
					</a>
				</nav>
			</div>
			<!-- CONTENIDO CENTRAL -->
			<main class="main col pt-0">
				<!-- BARRA SUPERIOR -->
				<div class="row d-none d-sm-block barra-superior mb-3">
					<!-- NOTIFICACIONES -->
					<div class="notificaciones">
						<!-- USUARIO -->
						<div class="usuario">
							<a class="menu-opcion" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6" class="user-name"><span class="nombre-cliente">Fenabocol ORG</span> <img src="../../img/logo.png"></a>
						</div>
						<!-- SALIR -->
						<div class="salir">
							<a href="../../SI/cerrarSesion/cerrarSesion.php"><i class="icon-switch" id="salir"></i></a>
						</div>
					</div>
				</div>
				<!-- CONTENIDO PRINCIPAL -->
				<div class="row pr-3">
					<div class="columna col">
						<div id="accordion">
							<!-- CARD #2 COTIZACIONES -->
							<div class="py-0 cotizaciones">
								<div id="collapse3">
									<!-- ACORDIO DE COTIZACIONES -->
									<div class="card card-body p-0">
										<div id="accordion-eventos" style="height: 89vh">
											<iframe id="principal" title="principal" name="principal" class="w-100" height="100%" src="../../SI/donante/crearJugadas/crearJugadas.php" frameborder="0"></iframe>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>

	<!-- SCRIPTS BOOTSTARP -->
	<script src="../../js/Bootstrap/jquery-3.2.1.min.js"></script>
	<script src="../../js/Bootstrap/popper.min.js"></script>
	<script src="../../js/Bootstrap/bootstrap.min.js"></script>
	<!-- SCRIPS PROPIOS -->
	<script>
		$(document).ready(function(){
			$('.menu-opcion').on('click', function(){
				$('.menu-opcion').removeClass('seleccionado');
				$(this).addClass('seleccionado');
			});
		});
	</script>
</body>
</html>