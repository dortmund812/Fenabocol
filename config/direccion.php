<?php session_start();
require_once 'config.php';
require_once 'funciones.php';

if ($_SESSION['jugador'] == 'fenabocolorg@gmail.com') {
	header('Location: '.RUTA.'SI/administrador/administrador.php');
	die();
} else if (!empty($_SESSION) && $_SESSION['jugador'] != 'fenabocolorg@gmail.com' && $_SESSION['rol'] != 'voluntario' && $_SESSION['rol'] != 'donante') {
	header('location: '.RUTA.'SI/bingoFenabocol/bingoFenabocol.php');
} else if (!empty($_SESSION) && $_SESSION['rol'] == 'voluntario') {
	header('location: '.RUTA.'SI/voluntario/voluntario.php');
} else if (!empty($_SESSION) && $_SESSION['rol'] == 'donante') {
	header('location: '.RUTA.'SI/donante/donante.php');
} else {
	header('Location: ' . RUTA . 'index.php');
}


?>