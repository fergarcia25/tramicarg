<?php
include('../../config/connection.php');
include('../../config/functions.php');
$tabla = 'tab_mensajes';
$id_tabla = 'id_mensajes';

// seteo y limpieza de variables //

if(!empty($_GET['id'])){
	$id = anti_hack('id',$_GET['id']);
}else{
	$id = '';
}

// guarda o actualiza los datos // 


	if(!empty($id)){
    
        $query = "update ".$tabla." set visto='Y' where ".$id_tabla." = ".$id;
        $result = mysqli_query($link,$query) or die (mysqli_error());
        
		if($result){
			?>
			<script>cargar('_list','msj=ok');</script>
			<?php
		}
		
	}

?>