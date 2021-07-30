<?php 
require_once '../../config/config.php';
require_once '../../config/funciones.php';
require_once '../../config/PHPMailer-5.2-stable/PHPMailerAutoload.php';

$salida = '';

// if (isset($_POST['nombre'])
// 	&& isset($_POST['correo'])
// 	&& isset($_POST['celular'])
// 	&& isset($_POST['mensaje'])) {
try {
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->Host='smpt.gmail.com';
	$mail->Port=587;
	$mail->SMTPAuth=true;
	$mail->SMTPSecure='tls';
	$mail->Username='eventshouse1234@gmail.com';
	$mail->Password='eventshouse1234';

	$mail->setFrom('carlosdavidgarcialopez@gmail.com','Prueba');
	$mail->addAddress('eventshouse1234@gmail.com');
	$mail->addReplyTo('carlosdavidgarcialopez@gmail.com','Prueba');

	$mail->isHTML(true);
	$mail->Subject='Enviado por Fenabocol';
	$mail->Body='<h1>Prueba de Envio de Correo</h1>';

	if (!$mail->send()) {
		$salida .= 'Errorenvio';
	} else {
		$salida .= 'Exito';
	}
} catch (Exception $e) {
	$salida .= 'Error: ' . $e;
}

// } else {
// 	$salida .= 'Errordatos';
// }

echo $salida;

?>