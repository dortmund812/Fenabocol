<?php session_start();

require_once '../../config/config.php';
require_once '../../config/funciones.php';

if (!empty($_SESSION)) {
	header('Location: ../../views/bingoFenabocol/bingoFenabocol.view.php');
} else {
	header('location: ../../index.php');
	die();
}

?>