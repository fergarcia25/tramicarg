<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_mensajes';
$id_tabla = 'id_mensajes';

// seteo y limpieza de variables //


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

if(!empty($_POST['telefono'])){
	$telefono = anti_hack('telefono',$_POST['telefono']);
}else{
	$telefono = '';
}

if(!empty($_POST['email'])){
	$email = anti_hack('email',$_POST['email']);
}else{
	$email = '';
}

if(!empty($_POST['mensaje'])){
	$mensaje = anti_hack('mensaje',$_POST['mensaje']);
}else{
	$mensaje = '';
}

if(!empty($_POST['visto'])){
	$visto = anti_hack('visto',$_POST['visto']);
}else{
	$visto = '';
}


if(!empty($_POST['id'])){
	$id = anti_hack('mensaje',$_POST['id']);
}else{
	$id = '';
}


// guarda o actualiza los datos // 
	$pass_update = '';
	$pass_insert_name = '';
	$pass_insert_valor = '';
	if(!empty($password)){
		if(!empty($password) && !empty($password2) && ($password == $password2)){
			$pass_update = ",password='$password'";
			$pass_insert_name = ",password";
			$pass_insert_valor = ",'$password'";
		}else{	
			echo "Error. Las contrase&ntilde;as no coinciden";	
		}
	}
		
if(!empty($id)){
		$query = "update ".$tabla." set nombre='$nombre',apellido='$apellido',email='$email',telefono='$telefono',fecha,visto='$visto' where ".$id_tabla." = ".$id;
		$result = mysqli_query($link,$query) or die (mysqli_error());
}else{
	$query = "INSERT INTO ".$tabla." (nombre,apellido,telefono,email,visto) VALUES ('$nombre','$apellido','$telefono','$email','NOW()','$visto' )";
	$result = mysqli_query($link,$query) or die(mysqli_error());
}

if($result){
	?>
	<script>cargar('_list','msj=ok');</script>
	<?php
}



		
?>