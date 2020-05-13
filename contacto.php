<?php
/*imprimir en pantalla las variables que recibimos desde el formulario
print_r($_POST);*/

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require ('datos.php');
require ('procesa.php');
//$mensaje = '';

//verificar que los datos del formulario se hayan enviado via post
/*if (isset($_POST['enviar']) && $_POST['enviar'] == 'si') {
	//print_r($_POST);
	//recuperar los datos del formulario
	$nombre = $_POST['nombre'];
	$teléfono = $_POST['teléfono'];
	$email = $_POST['email'];
	$asunto = $_POST['asunto'];
	$comentario = $_POST['comentario'];

	if (!$nombre) {
		$mensaje = 'Ingrese su nombre';
	}	elseif (!$teléfono) {
		$mensaje = 'El teléfono no es valido';
	}elseif (!$email) {
		$mensaje = 'El email no es valido';
	}elseif (!$asunto) {
		$mensaje = 'Indique un asunto';
	}elseif (!$comentario) {
		$mensaje = 'Ingrese un comentario';*/

$procesa = new Procesa();

if (isset($_POST['enviar']) && $_POST['enviar'] == 'si') {


	$nombre = strip_tags($_POST['nombre']);
	$teléfono = $_POST['teléfono'];
	$email = $_POST['email'];
	$asunto = $_POST['asunto'];
	$ejecutivo = $_POST['ejecutivo'];
	$comentario = $_POST['comentario'];

	if (!$nombre) {
		$mensaje = 'Ingresa tu nombre';
	}elseif(!$teléfono){
		$mensaje = 'Ingrese su teléfono';
	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$mensaje = 'El email no es válido';
	}elseif(!$asunto){
		$mensaje = 'Seleccione asunto';
	}elseif(!$ejecutivo){
		$mensaje = 'Seleccione un ejecutivo';
	}elseif(!$comentario){
		$mensaje = 'Ingrese comentario';
	}else{
		$procesa->setNombre($nombre);
		$procesa->setTeléfono($teléfono);
		$procesa->setEmail($email);
		$procesa->setAsunto($asunto);
		$procesa->setEjecutivo($ejecutivo);
		$procesa->setComentario($comentario);

		echo $procesa->getNombre();
		echo $procesa->getTeléfono();
		echo $procesa->getEmail();
		echo $procesa->getAsunto();
		echo $procesa->getEjecutivo();
		echo $procesa->getComentario();
	}/*
	else{
		//$m = 'Gracias por escribirnos, pronto nos comunicaremos con usted';
		header('Location: saludo.php?nombre=' . $nombre);
	}*/
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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
					<div class="lateralizq" style="height: 100px;">
						<p style="text-align: center;padding-top: 13%">
							<a href="https://soporte.uchile.cl/mediawiki/index.php/Eduroam" class="lateraliz" target="_blank">Señal Eduroam
							</a> 
						</p>
			
					</div><hr style="margin-left: 20px">
					<div class="lateralizq" style="height: 100px;">
						<p style="text-align: center; padding-top: 13%">
							<a href="https://soporte.uchile.cl/mediawiki/index.php/Servicio_VPN_UChile" class="lateraliz" target="_blank">VPN Corporativa
							</a> 
						</p>
			
					</div><hr style="margin-left: 20px">
					<div class="lateralizq" style="height: 100px;">
						<p style="text-align: center; padding-top: 13%">
							<a href="https://soporte.uchile.cl/mediawiki/index.php/Telefon%C3%ADa_IP" class="lateraliz">Telefonía IP
							</a> 
						</p>
			
					</div><hr style="margin-left: 20px">
				</div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-8 col-xl-8">
					<div><img src="img/correo.png" alt="" style="float: right; width: 18%"></div>
						
					<h4 style="font-weight: bold">FORMULARIO DE CONTACTO</h4>
					<?php if(isset($mensaje)): ?>
						<p class="alert alert-danger" style="width: 50%"><?php echo $mensaje; ?></p>
					<?php endif; ?>
					<form action="" method="post">
						<div class="form-group">
							<label for="nombre">Nombre</label>
						    <input type="text" class="form-control" name="nombre" 
						           aria-describedby="emailHelp" placeholder="Ingrese su nombre y apellido" style="width: 50%" value="<?php echo @($nombre); ?>"><br>
						    <label for="phone">Teléfono</label>
						    <input type="teléfono" class="form-control" name="teléfono" 
						           aria-describedby="emailHelp" placeholder="Ingrese su teléfono"style="width: 50%" value="<?php echo @($teléfono); ?>"><br>
						    <label for="exampleInputEmail1">Email</label>
						    <input type="email" class="form-control" name="email" 
						           aria-describedby="emailHelp" placeholder="Ingrese correo Electrónico"style="width: 50%" value="<?php echo @($email); ?>"><br>
						    <label>Seleccione un asunto:</label><br>
									<select name="asunto" class="form-control" style="width: 50%">
									<option value="<?php echo @($asunto); ?>">Seleccione...</option>
									<?php foreach($servicios as $servicio): ?>
							<option value=""><?php echo $servicio; ?></option>
						<?php endforeach; ?>
								</select><br>
								<label>Indique Ejecutivo de su confianza</label><br>
									<select name="ejecutivo" class="form-control" style="width: 50%">
									<option value="<?php echo @($ejecutivo); ?>">Seleccione...</option>
									<?php foreach($ejecutivos as $ejecutivo): ?>
							<option value=""><?php echo $ejecutivo; ?></option>
						<?php endforeach; ?>
								</select><br>
						    <label for="exampleInputEmail1">Comentario</label>
						    <textarea type="email" class="form-control" name="comentario" 
						           aria-describedby="emailHelp" placeholder="Ingrese su comentario"style="width: 50%;resize: none" rows="5" value="<?php echo @($comentario); ?>"></textarea><br>
						    <button type="submit" class="btn btn-success" name="enviar" value="si">Enviar</button>
						</div>
					</form><br><br>
					<p><h5>TELÉFONOS DE CONTACTO</h5></p>
					<p style="font-weight: bold">SEDE ALFONSO LETELIER</p>
					<p>Teléfono: 229780802</p>
					<p style="font-weight: bold">SEDE PEDRO DE LA BARRA</p>
					<p>Teléfono: 229771806</p>
					<p style="font-weight: bold">SEDE LAS ENCINAS</p>
					<p>Teléfono: 229787542</p>
					
				</div>


				<div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 ">
					<div class="lateralizq" style="height: 100px;">
						<p style="text-align: center;padding-top: 13%">
							<a href="https://soporte.uchile.cl/mediawiki/index.php/Licencias_de_Software" class="lateraliz" target="_blank">Licenciamiento
							</a> 
						</p>
			
					</div><hr style="margin-left: 20px">
					<div class="lateralizq" style="height: 100px;">
						<p style="text-align: center;padding-top: 13%">
							<a href="https://soporte.uchile.cl/mediawiki/index.php/Tarjeta_Universitaria_Inteligente" class="lateraliz" target="_blank">TUI
							</a> 
						</p>
			
					</div><hr style="margin-left: 20px">
					<div class="lateralizq" style="height: 100px;">
						<p style="text-align: center;padding-top: 13%">
							<a href="https://soporte.uchile.cl/mediawiki/index.php/Correo_Corporativo" class="lateraliz" target="_blank">Correo Corporativo
							</a> 
						</p>
			
					</div><hr style="margin-left: 20px">
				</div>
			</div>

		</div>

		
	
	
	<div class="container-fluid">
		<footer class="footer">
			<p style="text-align: center; color: #fff" class="my-auto">Derechos Reservados Unidad STC Facultad de Artes Universidad de Chile. 2019</p>
			<p style="text-align: center; color: #fff" class="my-auto">Teléfonos de Contacto: 229787542 - 229780802</p>
		</footer>
	</div>
	
	<script src="js/lightbox-plus-jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.slim.min.js"></script>
</body>

</html>