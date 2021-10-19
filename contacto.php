<?php
//imprimir en pantalla las variables que recibimos desde el formulario
//print_r($_POST);

error_reporting(E_ALL);
ini_set('display_errors', '1');
require ('datos.php');
require ('procesa.php');
require ('class.phpmailer.php');
require ('class.smtp.php');
//$mensaje = '';



$procesa = new Procesa();

// Datos de la cuenta de correo utilizada para enviar vía SMTP


if (isset($_POST['enviar']) && $_POST['enviar'] == 'si') {


	$nombre = strip_tags($_POST['nombre']);
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	$asunto = $_POST['asunto'];
	$sede = $_POST['sede'];
	$comentario = $_POST['comentario'];
	$destinatario = "mesaayudaartes@uchile.cl";

	$smtpHost = "smtp.gmail.com";  // Dominio alternativo brindado en el email de alta 
	$smtpUsuario = "stcartes@gmail.com";  // Mi cuenta de correo
	$smtpClave = "S0p0rt32012";  // Mi contraseña


	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Port = 587; 
	$mail->IsHTML(true); 
	$mail->CharSet = "utf-8";

	// VALORES A MODIFICAR //
	$mail->Host = $smtpHost; 
	$mail->Username = $smtpUsuario; 
	$mail->Password = $smtpClave;

	if (!$nombre){
		$mensaje = 'Ingresa tu nombre';
	}elseif(!$telefono){
		$mensaje = 'Ingrese su teléfono';
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$mensaje = 'El email no es válido';
	}elseif(!$asunto){
		$mensaje = 'Seleccione asunto';
	}elseif(!$sede){
		$mensaje = 'Seleccione una sede';
	}elseif(!$comentario){
		$mensaje = 'Ingrese comentario';
	}else{
		$procesa->setNombre($nombre);
		$procesa->setTelefono($telefono);
		$procesa->setEmail($email);
		$procesa->setAsunto($asunto);
		$procesa->setSede($sede);
		$procesa->setComentario($comentario);

		//echo $procesa->getNombre();
		//echo $procesa->getTelefono();
		//echo $procesa->getEmail();
		//echo $procesa->getAsunto();
		//echo $procesa->getEjecutivo();
		//echo $procesa->getComentario();
		$email_to = "mesaayudaartes@uchile.cl";
		$email_subject = "Contacto desde portal Unidad STC";
		$email_detalle = "Detalles del formulario de contacto:\n\n";
		$email_nom = "Nombre: " . $_POST['nombre'] . "\n";
		$email_tel = "Teléfono: " . $_POST['telefono'] . "\n";
		$email_mail = "E-mail: " . $_POST['email'] . "\n";
		$email_asun = "Asunto: " . $_POST['asunto'] . "\n";
		$email_sede = "Sede: " . $_POST['sede'] . "\n";
		$email_com = "Comentario: " . $_POST['comentario'] . "\n\n";

		//$headers = 'From: '. $email_from ."\r\n".
		//$headers = 'Reply-To: '. $email_from."\r\n" .
		$headers = 'X-Mailer: PHP/' . phpversion();
		//mail($email_to, $email_subject, $email_detalle, $email_nom, $email_tel, $email_mail, $email_asun, $email_sede, $email_com);
		$m = 'Gracias por escribirnos, pronto nos comunicaremos con usted';
		header('Location: saludo.php?nombre=' . $nombre);

		/*$mail->From = $email; // Email desde donde envío el correo.
		$mail->FromName = $nombre;
		$mail->AddAddress($destinatario); // Esta es la dirección a donde enviamos los datos del formulario
		
		$mail->Subject = "Formulario desde el Sitio Web"; // Este es el titulo del email.
		$mensajeHtml = nl2br($mensaje);
		$mail->Body = "
		<html> 
		
		<body> 
		
		<h1>Recibiste un nuevo mensaje desde el formulario de contacto</h1>
		
		<p>Informacion enviada por el usuario de la web:</p>
		
		<p>nombre: {$nombre}</p>
		
		<p>email: {$email}</p>
		
		<p>telefono: {$telefono}</p>
		
		<p>asunto: {$asunto}</p>
		
		<p>mensaje: {$mensaje}</p>
		
		</body> 
		
		</html>
		
		<br />"; // Texto del email en formato HTML
		$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
		// FIN - VALORES A MODIFICAR //
		
		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);*/
	}
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>UNIDAD STC. CONTÁCTENOS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
</head>

<body>
	<div class="container-fluid">
		<?php include('header.php'); ?>
	</div>

	

		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 ">
					<div >						
						<a href="https://soporte.uchile.cl/categoria/eduroam-red-wifi/" class="btn btn-outline-dark" type="button" target="_blank" style="width: 90%;">SEÑAL EDUROAM</a>
			
					</div><hr style="margin-left: 20px">
					<div >
						<a href="https://soporte.uchile.cl/categoria/conexion-via-vpn/" class="btn btn-outline-dark" type="button" target="_blank" style="width: 90%;">VPN CORPORATIVA</a>						
			
					</div><hr style="margin-left: 20px">
					<div >
						<a href="https://soporte.uchile.cl/categoria/telefonia-ip/" class="btn btn-outline-dark" type="button" target="_blank" style="width: 90%;">TELEFONÍA IP</a>
						
			
					</div><hr style="margin-left: 20px">
				</div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-8 col-xl-8">
					<div><img src="img/correo.png" alt="" style="float: right; width: 18%"></div>
					<div class="card" style="width: 70%;">
						<h4 class="card-header" style="font-weight: bold;">FORMULARIO DE CONTACTO</h4>
						<?php if(isset($mensaje)): ?>
							<p class="alert alert-danger" style="width: 50%"><?php echo $mensaje; ?></p>
						<?php endif; ?>
						<div class="card-body">
							<form action="contacto.php" method="post">
								<div class="form-group">
									<label for="nombre" class="text text-info">Nombre</label>
									<input type="text" class="form-control" name="nombre" 
										aria-describedby="emailHelp" placeholder="Ingrese su nombre y apellido" style="width: 50%" value="<?php echo @($nombre); ?>"><br>
									<label for="phone" class="text text-info">Teléfono</label>
									<input type="telefono" class="form-control" name="telefono" 
										aria-describedby="emailHelp" placeholder="Ingrese su teléfono"style="width: 50%" value="<?php echo @($telefono); ?>"><br>
									<label for="exampleInputEmail1" class="text text-info">Email</label>
									<input type="email" class="form-control" name="email" 
										aria-describedby="emailHelp" placeholder="Ingrese correo Electrónico"style="width: 50%" value="<?php echo @($email); ?>"><br>
									<label class="text text-info">Seleccione un asunto:</label><br>
											<select name="asunto" class="form-control" style="width: 50%" type="text">
												<option value="<?php echo @($asunto); ?>" name="">Seleccione...</option>
												<?php foreach($servicios as $servicio): ?>
													<option value="<?php echo $servicio; ?>" name="asunto"><?php echo $servicio; ?></option>
												<?php endforeach; ?>
											</select><br>
										<label class="text text-info">Indique Sede</label><br>
											<select name="sede" class="form-control" style="width: 50%">
											<option value="<?php echo @($sede); ?>">Seleccione...</option>
											<?php foreach($sedes as $sede): ?>
									<option value="<?php echo $sede; ?>"><?php echo $sede; ?></option>
								<?php endforeach; ?>
										</select><br>
									<label for="exampleInputEmail1" class="text text-info">Comentario</label>
									<textarea type="email" class="form-control" name="comentario" 
										aria-describedby="emailHelp" placeholder="Ingrese su comentario"style="width: 50%;resize: none" rows="5" value="<?php echo @($comentario); ?>"></textarea><br>
									<button type="submit" class="btn btn-success" name="enviar" value="si">Enviar</button>
								</div>
							</form><br><br>
					</div>
				</div>	
					
					<p><h5>TELÉFONOS DE CONTACTO</h5></p>
					<p style="font-weight: bold">SEDE ALFONSO LETELIER</p>
					<p>Teléfono: 229780802</p>
					<p style="font-weight: bold">SEDE PEDRO DE LA BARRA</p>
					<p>Teléfono: 229771806</p>
					<p style="font-weight: bold">SEDE LAS ENCINAS</p>
					<p>Teléfono: 229787542</p>
					
				</div>


				<div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 ">
					<div >
						<a href="https://soporte.uchile.cl/categoria/licencias-de-software/" class="btn btn-outline-dark" type="button" target="_blank" style="width: 90%;">LICENCIAMIENTO</a>
						
			
					</div><hr style="margin-left: 20px">
					<div >
						<a href="https://soporte.uchile.cl/categoria/correo-corporativo/" class="btn btn-outline-dark" type="button" target="_blank" style="width: 90%;">CORREO COPORATIVO</a>
						
			
					</div><hr style="margin-left: 20px">
					<div >
						<a href="https://soporte.uchile.cl/categoria/tarjeta-universitaria-inteligente/" class="btn btn-outline-dark" type="button" target="_blank" style="width: 90%;">TUI</a>
						
			
					</div><hr style="margin-left: 20px">
				</div>
			</div>

		</div>
		<div class="container-fluid">
		<div style="text-align:center;">
		<a href="https://api.whatsapp.com/send?phone=56965774174&text=Quiero%20reportar%20un%20problema" class="btn btn-outline-success" role="button" aria-pressed="true">Contáctanos por Whatsapp</a></div>
		
		</div><br>
		
	
	
	<footer>
		<?php include('footer.php'); ?>
	</footer>

	<script src="js/lightbox-plus-jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
	<script async src="https://www.google.com/recaptcha/api.js"></script>
</body>

</html>