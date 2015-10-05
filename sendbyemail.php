<?php
$nombre = htmlspecialchars($_POST['nombre']);
$email = htmlspecialchars($_POST['email']);
$mensaje =htmlspecialchars($_POST['mensaje']) ;
$asunto = 'Mensaje de página Tuentieventos';
$asunto= '=?utf-8?B?'.base64_encode($asunto).'?=';
//codificamos asunto para aceptar tildes y caractéres raros
$mensaje = '
<html>
<head>
	<meta charset="utf-8" />
	<style>
		p{font-size: 18px;}
	</style>
</head>
<body style="text-align: center;background-color: #911ba7;color: aliceblue;">
	<h1>Estimado Cliente :</h1>
	<p>Recibimos su contacto el cual consta seg&uacute;n siguiente:</p>
	 <p> Nombre: <strong>'.$nombre.'</strong> </p>
	 <p>Email :'.$email.' </p>
	 <p>Mensaje:</p> <p><strong>'.$mensaje.'</p></strong>
	 <p>Estamos haciendo seguimiento y responderemos en la brevedad.</p>
	 <hr>
	 <i>Informaci&oacute;n enviada por  Copyright Tuentieventos 2015</i>
</body>
</html>
';

// Cabecera que especifica que es un HMTL
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
 
// Cabeceras adicionales
$cabeceras .= 'From: Tuentieventos<eventos@tuentieventos.com>' . "\r\n";
$cabeceras .= 'Reply-To: Tuentieventos<eventos@tuentieventos.com>'."\r\n";
$cabeceras .= 'Cc: Tuentieventos<eventos@tuentieventos.com>' . "\r\n";
//$cabeceras .= 'Bcc: copiaoculta@example.com' . "\r\n";

// email_destino,subject , contenido_mensaje, cabecera
if (mail($email,$asunto, $mensaje,$cabeceras)) {
echo "<script>alert('Mensaje enviado, muchas gracias.');
window.location.href = 'index.php';
</script>";
} else {
	echo 'Fallo de envio';
}

?>