<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_categ';
$id_tabla = 'id_categ';

// seteo y limpieza de variables //


if(!empty($_POST['nombre'])){
	$nombre = anti_hack('nombre',$_POST['nombre']);
}else{
	$nombre = '';
}

if(!empty($_POST['estado'])){
	$estado = anti_hack('estado',$_POST['estado']);
}else{
	$estado = '';
}

if(!empty($_POST['descripcion'])){
	$descripcion = anti_hack_textarea('descripcion',$_POST['descripcion']);
}else{
	$descripcion = '';
}

if(!empty($_POST['id'])){
	$id = anti_hack('id',$_POST['id']);
}else{
	$id = '';
}


		
if(!empty($id)){
		$query = "update ".$tabla." set nombre='$nombre',estado='$estado',descripcion='$descripcion' where ".$id_tabla." = ".$id;
		$result = mysqli_query($link,$query) or die (mysqli_error());
}else{
	$query = "INSERT INTO ".$tabla." (nombre,estado,descripcion) VALUES ('$nombre','$estado','$descripcion')";
	$result = mysqli_query($link,$query) or die(mysqli_error());
}

if($result){
	
	if(!empty($cerrar)){
	?>
	<script>
	cargar('_list','msj=ok');
	</script>
	<?php	  
	}else{
	?>
	<script>cargar('_list','msj=error');</script>
	<?php
	}
}



		
?>