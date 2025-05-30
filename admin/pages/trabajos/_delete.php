<?php

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');
$tabla = 'tab_trabajos';
$id_tabla = 'id_trabajos';

// seteo y limpieza de variables //

if(!empty($_GET['id'])){
	$id = anti_hack('id',$_GET['id']);
}else{
	$id = '';
}

// guarda o actualiza los datos // 


	if(!empty($id)){
	
		$query = "DELETE FROM ".$tabla." WHERE ".$id_tabla." = ".$id;
		$result = mysqli_query($link,$query);
		
		if($result){
			?>
			<script>cargar('_list','msj=ok');</script>
			<?php
		}
		
	}

?>