<?php 
require_once '../../../config/config.php';
require_once '../../../config/funciones.php';
require_once '../../../config/PHPExcel/Classes/PHPExcel.php';
$conexion = conexion($base_datos);
if (!$conexion) {
	die();
}
$salida = '';
if (isset($_POST['json'])) {
	$jugadasAlm = json_decode($_POST['json']);
	$fila = 2;
	$objPHPExcel = new PHPExcel();
	$objPHPExcel->getProperties()->setCreator("Fenabocol ORG")->setDescription("Jugadas Asignadas");
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle("Jugadas");

	$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID');
	$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Codigo');
	$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Valor');
	$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Estado');

	foreach ($jugadasAlm->{"data"} as $jugada) {
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, $jugada->{"ID"});
		$objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, $jugada->{"codigo"});
		$objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $jugada->{"valor"});
		$objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $jugada->{"estado"});
		registrarJugadaAsignada($conexion, '', '', '', '', '', '', $jugada->{"codigo"}, '');
		$fila++;
	}

	header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	header('Content-Disposition: attachment;filename="'.$jugadasAlm->{"titulo"}.'.xlsx"');
	header('Cache-Control: max-age=0');

	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	$objWriter->save('php://output');

	$salida .= 'Exito';
} else {
	$salida .= 'Error';
}


echo $salida;

?>