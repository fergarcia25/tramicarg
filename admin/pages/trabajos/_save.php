<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$page = 'trabajos';
$tabla = 'tab_trabajos';
$id_tabla = 'id_trabajos';

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

if(!empty($_POST['categ'])){
	$categ = anti_hack('categ',$_POST['categ']);
}else{
	$categ = '';
}

if(!empty($_POST['contenido'])){
	$contenido = ($_POST['contenido']);
}else{
	$contenido = '';
}

if(!empty($_POST['estado'])){
	$estado = anti_hack('estado',$_POST['estado']);
}else{
	$estado = '';
}

if(!empty($_POST['id'])){
	$id = anti_hack('id',$_POST['id']);
}else{
	$id = '';
}
		
if(!empty($id)){
		$query = "update ".$tabla." set titulo='$titulo',description='$description',categ='$categ',contenido='$contenido',estado='$estado' where ".$id_tabla." = ".$id;
		$result = mysqli_query($link,$query);
}else{
	$query = "INSERT INTO ".$tabla." 
	(titulo,description,categ,contenido,estado,fecha) VALUES ('$titulo','$description','$categ','$contenido','$estado',NOW())";
	$result = mysqli_query($link,$query);
}

if($result){
	?>
	<script>
	//cargar('_list','msj=ok');
	location.href='<?php echo $page;?>.php';
	</script>
	<?php
}

?>