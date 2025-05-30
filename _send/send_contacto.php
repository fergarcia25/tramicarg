<?php 
include('../config/functions.php');

if(!empty($_POST['nombre'])){
	$nombre = anti_hack('nombre',$_POST['nombre']);
}else{
	$nombre = '';
}

if(!empty($_POST['apellido'])){
	$apellido = anti_hack('apellido',$_POST['apellido']);
}else{
	$apellido = '';
}

if(!empty($_POST['email'])){
	$email = anti_hack('email',$_POST['email']);
}else{
	$email = '';
}

if(!empty($_POST['phone'])){
	$telefono = anti_hack('phone',$_POST['phone']);
}else{
	$telefono = '';
}

if(!empty($_POST['organization'])){
	$organization = anti_hack_textarea('organization',$_POST['organization']);
}else{
	$organization = '';
}


if($nombre && $email && $phone) {

//PHPmailer

		$to = 'fer.garcia25@gmail.com';
		
		require_once('../PHPMailer_5.2.1/class.phpmailer.php');
		$mail = new PHPMailer(); // defaults to using php "mail()"

		//Luego tenemos que iniciar la validación por SMTP:
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = "c2530589.ferozo.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
		$mail->Username = "no-reply@blackwhaleassets.com"; // Correo completo a utilizar
		$mail->Password = "so/Cfm82iU"; // Contraseña
		$mail->Port = 25; // Puerto a utilizar

		//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
		$mail->From = "no-reply@blackwhaleassets.com"; // Desde donde enviamos (Para mostrar)
		$mail->FromName = "Black Whale";

		//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: “From: Nombre <correo@dominio.com>”) de //correo.
		$mail->AddAddress("mgasser@blackwhaleassets.com"); // Esta es la dirección a donde enviamos
		$mail->IsHTML(true); // El correo se envía como HTML
		$mail->Subject = "Black Whale - New menssage"; // Este es el titulo del email.
		
		$body = '
		<body>
		<div style="padding:20px; width:600px; font-size: 16px;">
			<h1>Black Whale<h1>
			<h5>Nueva consulta de '.utf8_decode($nombre).'</h5>
			<strong>Nombre:</strong> '.utf8_decode($nombre).' '.utf8_decode($apellido).' <br>
			<strong>Email:</strong> '.utf8_decode($email).' <br>
			<strong>Telefono:</strong> '.utf8_decode($telefono).' <br>
			<strong>Organizacion:</strong> '.utf8_decode($organization).'<br><br>
			<a href="mailto:'.$email.'" style="font-size:14px; padding: 10px 20px; border: solid 1px #c2c2c2; border-radius: 5px; color: #222;">click aqui para respoder</a>
		</div>
		</body>
		';
		$mail->Body = $body; // Mensaje a enviar
		$exito = $mail->Send(); // Envía el correo.

		if(!empty($exito)) {
		?>
		  <span class="alert-success">Enviado! En breve nos pondremos en contacto. Muchas gracias</span>
          <script>
			  document.getElementById('contact-form').reset();
		  </script>
        <?php
		}
}else{ ?>
	<span style="color:#C00"><br />Por favor, completa tus datos correctamente.</span>
<?php 
} ?>