<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_user';
$id_tabla = 'id_user';

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

if(!empty($_POST['dni'])){
	$dni = anti_hack('dni',$_POST['dni']);
}else{
	$dni = '';
}

if(!empty($_POST['tipo'])){
	$tipo = anti_hack('tipo',$_POST['tipo']);
}else{
	$tipo = '';
}

if(!empty($_POST['estado'])){
	$estado = anti_hack('estado',$_POST['estado']);
}else{
	$estado = '';
}
if(!empty($_POST['calle'])){
	$calle = anti_hack('calle',$_POST['calle']);
}else{
	$calle = '';
}

if(!empty($_POST['altura'])){
	$altura = anti_hack('altura',$_POST['altura']);
}else{
	$altura = '';
}

if(!empty($_POST['provincia'])){
	$provincia = anti_hack('provincia',$_POST['provincia']);
}else{
	$provincia = '';
}

if(!empty($_POST['localidad'])){
	$localidad = anti_hack('localidad',$_POST['localidad']);
}else{
	$localidad = '';
}

if(!empty($_POST['password'])){
	$password = anti_hack('password',$_POST['password']);
	$password = md5($password);
}else{
	$password = '';
}

if(!empty($_POST['password2'])){
	$password2 = anti_hack('password2',$_POST['password2']);
	$password2 = md5($password2);
}else{
	$password2 = '';
}

if(!empty($_POST['id'])){
	$id = anti_hack('id',$_POST['id']);
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
		$query = "update ".$tabla." set nombre='$nombre',apellido='$apellido',email='$email',telefono='$telefono',estado='$estado',dni='$dni',tipo='$tipo',calle='$calle',altura='$altura',provincia='$provincia',localidad='$localidad' ".$pass_update." where ".$id_tabla." = ".$id;
		$result = mysqli_query($link,$query) or die (mysqli_error());
}else{
	$query = "INSERT INTO ".$tabla." (nombre,apellido,telefono,email,estado,dni,calle,altura,provincia,localidad,fecha_registro ".$pass_insert_name.") VALUES ('$nombre','$apellido','$telefono','$email','$estado','$dni','$calle','$altura','$provincia','$localidad',NOW() ".$pass_insert_valor." )";
	$result = mysqli_query($link,$query) or die(mysqli_error());
	$id = mysql_insert_id();
}

if($result){
	?>
	<script>cargar('_list','msj=error');</script>
	<?php
}



		
?>