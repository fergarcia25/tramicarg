<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_faqs';
$id_tabla = 'id_faqs';

// seteo y limpieza de variables //


if(!empty($_POST['titulo'])){
	$titulo = anti_hack('titulo',$_POST['titulo']);
}else{
	$titulo = '';
}

if(!empty($_POST['estado'])){
	$estado = anti_hack('estado',$_POST['estado']);
}else{
	$estado = '';
}


if(!empty($_POST['respuesta'])){
	$respuesta = anti_hack('respuesta',$_POST['respuesta']);
}else{
	$respuesta = '';
}

if(!empty($_POST['id'])){
	$id = anti_hack('id',$_POST['id']);
}else{
	$id = '';
}

if(!empty($_POST['c'])){
	$c = anti_hack('c',$_POST['c']);
}else{
	$c = '';
}


		
if(!empty($id)){
		$query = "update ".$tabla." set titulo='$titulo',estado='$estado',respuesta='$respuesta' where ".$id_tabla." = ".$id;
		$result = mysqli_query($link,$query) or die (mysqli_error());
}else{
	$query = "INSERT INTO ".$tabla." (titulo,estado,respuesta) VALUES ('$titulo','$estado','$respuesta')";
	$result = mysqli_query($link,$query) or die(mysqli_error());
	$id = mysql_insert_id();
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
	<script>cargar('_list','');</script>
	<?php
	}
}



		
?>