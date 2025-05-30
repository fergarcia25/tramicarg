<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$page = 'productos';
$tabla = 'tab_productos';
$id_tabla = 'id_productos';

// seteo y limpieza de variables //


if(!empty($_POST['titulo'])){
	$titulo = anti_hack('titulo',$_POST['titulo']);
}else{
	$titulo = '';
}

if(!empty($_POST['descripcion'])){
	$descripcion = $_POST['descripcion'];
}else{
	$descripcion = '';
}

if(!empty($_POST['estado'])){
	$estado = anti_hack('estado',$_POST['estado']);
}else{
	$estado = '';
}

if(!empty($_POST['creditos'])){
	$creditos = anti_hack('creditos',$_POST['creditos']);
}else{
	$creditos = '';
}

if(!empty($_POST['precio_lista'])){
	$precio_lista = anti_hack('precio_lista',$_POST['precio_lista']);
}else{
	$precio_lista = '';
}

if(!empty($_POST['ahorro'])){
	$ahorro = anti_hack('ahorro',$_POST['ahorro']);
}else{
	$ahorro = '';
}

if(!empty($_POST['rondas'])){
	$rondas = anti_hack('rondas',$_POST['rondas']);
}else{
	$rondas = '';
}

if(!empty($_POST['tiempo'])){
	$tiempo = ($_POST['tiempo']);
}else{
	$tiempo = '0';
}

if(!empty($_POST['ronda1'])){
	$ronda1 = anti_hack('ronda1',$_POST['ronda1']);
}else{
	$ronda1 = '0';
}

if(!empty($_POST['ronda2'])){
	$ronda2 = anti_hack('ronda2',$_POST['ronda2']);
}else{
	$ronda2 = '0';
}

if(!empty($_POST['ronda3'])){
	$ronda3 = anti_hack('ronda3',$_POST['ronda3']);
}else{
	$ronda3 = '0';
}

if(!empty($_POST['ronda4'])){
	$ronda4 = anti_hack('ronda4',$_POST['ronda4']);
}else{
	$ronda4 = '0';
}

if(!empty($_POST['ronda5'])){
	$ronda5 = anti_hack('ronda5',$_POST['ronda5']);
}else{
	$ronda5 = '0';
}


if(!empty($_POST['id'])){
	$id = anti_hack('id',$_POST['id']);
}else{
	$id = '';
}
		
if(!empty($id)){
		$query = "update ".$tabla." set titulo='$titulo',descripcion='$descripcion',estado='$estado',creditos='$creditos',ahorro='$ahorro',rondas='$rondas',tiempo='$tiempo',ronda1='$ronda1',ronda2='$ronda2',ronda3='$ronda3',ronda4='$ronda4',ronda5='$ronda5' where ".$id_tabla." = ".$id;
		$result = mysqli_query($link,$query);
}else{
	$query = "INSERT INTO ".$tabla." 
	(titulo,descripcion,estado,fecha,creditos,precio_lista,ahorro,rondas,tiempo,ronda1,ronda2,ronda3,ronda4,ronda5) 
	VALUES ('$titulo','$descripcion','$estado',NOW(),'$creditos','$precio_lista','$ahorro','$rondas','$tiempo','$ronda1','$ronda2','$ronda3','$ronda5','$ronda5')";
	$result = mysqli_query($link,$query);
	$id = mysql_insert_id();
}

if($result){

	$query = "update tab_files set sonof='".$id."', folder='".$page."' where sonof = 'INC'";
	$resultUpdate = mysqli_query($link,$query);

	if($resultUpdate){
	?>
	<script>
	//cargar('_list','msj=ok');
	location.href='productos.php';
	</script>
	<?php
	}else{
		echo "error al guardar la foto";
	}
}

echo "Guardando..";
		
?>