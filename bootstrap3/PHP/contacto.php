<?php 
	error_reporting( E_ALL & ~( E_NOTICE | E_STRICT | E_DEPRECATED ) );

	require_once "Mail.php"; 

	$Name = $_POST['first_name'];
	$LastName = $_POST['last_name'];
	$Mail = $_POST['email'];
	$Phone = $_POST['telephone'];
	$Comments = $_POST['comments'];

	$to = 'luis90madrid@gmail.com'; 
	$from = 'info@bytedesigning.net'; 
	$host = 'smtp.bytedesigning.net'; 
	$username = 'info@bytedesigning.net'; 
	$password = '@1234a56B'; 
	$subject = 'webmailform'; 
	$body = 'Nombre: $Name \n<br/>'.
	'Apellido/s: $LastName'.
    	'Mail: $Mail \n<br/>'.
    	'Tel: $Phone \n<br/>'.
    	'Mensaje: $Comments \n<br/>'; 

	$headers = array ('From' => $from,
	'To' => $to,
	'Subject' => $subject);

	$smtp = Mail::factory('smtp',
	array ('host' => $host,
	'auth' => true,
	'username' => $username,
	'password' => $password));

	$mail = $smtp->send($to, $headers, $body);

	if (PEAR::isError($mail)) {
		echo(" " . $mail->getMessage() . " ");
	}
	else {
		echo "Mensaje enviado desde Web Byte a ". $to ;
	}
?>
