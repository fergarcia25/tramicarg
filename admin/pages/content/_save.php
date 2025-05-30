<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$page = 'content';
$tabla = 'tab_content';
$id_tabla = 'id_content';

// seteo y limpieza de variables //


if(!empty($_POST['titulo'])){
	$titulo = anti_hack('titulo',$_POST['titulo']);
}else{
	$titulo = '';
}

if(!empty($_POST['description'])){
	$description = anti_hack('description',$_POST['description']);
}else{
	$description = '';
}

if(!empty($_POST['keywords'])){
	$keywords = anti_hack('keywords',$_POST['keywords']);
}else{
	$keywords = '';
}

if(!empty($_POST['contenido'])){
	$contenido = $_POST['contenido'];
}else{
	$contenido = '';
}

if(!empty($_POST['estado'])){
	$estado = anti_hack_textarea('estado',$_POST['estado']);
}else{
	$estado = '';
}

if(!empty($_POST['id'])){
	$id = anti_hack('id',$_POST['id']);
}else{
	$id = '';
}

		
if(!empty($id)){
		$query = "update ".$tabla." set titulo='$titulo',description='$description',keywords='$keywords',contenido='$contenido',estado='$estado',ultima_modificacion=NOW() where ".$id_tabla." = ".$id;
		$result = mysqli_query($link,$query);
}else{
	$query = "INSERT INTO ".$tabla." (titulo,description,keywords,contenido,estado,ultima_modificacion) VALUES ('$titulo','$description','$keywords','$contenido','$estado',NOW())";
	$result = mysqli_query($link,$query);
	$id = mysqli_insert_id($link);
}

if($result){

	$query = "update tab_files set sonof='".$id."', folder='".$page."' where sonof = ''";
	$result = mysqli_query($link,$query);
	
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