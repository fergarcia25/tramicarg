<?php
include('../../config/connection.php');
$tabla = 'tab_faqs';
$id_tabla = 'id_faqs';

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