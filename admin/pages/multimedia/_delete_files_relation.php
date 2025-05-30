<?php

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_files_relation';
$id_tabla = 'id_files_relation';

// seteo y limpieza de variables //

if(!empty($_GET['page'])){
	$page = anti_hack('page',$_GET['page']);
}else{
	$page = '';
}

if(!empty($_GET['idArticulo'])){
	$idArticulo = anti_hack('idArticulo',$_GET['idArticulo']);
}else{
	$idArticulo = '';
}

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
            <script>            
            cargarDivFiles('files_relation_pages','../multimedia/_files_relation_pages','<?php echo $idArticulo;?>','<?php echo $page;?>','<?php echo $idArticulo;?>');
            </script>
			<?php
		}
		
	}

?>