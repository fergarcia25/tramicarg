<?php
include('../../config/connection.php');
include('../../config/functions.php');
$tabla = 'tab_categ';
$id_tabla = 'id_categ';

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