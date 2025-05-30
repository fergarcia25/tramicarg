<?php
$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_files';
$id_tabla = 'id';

// seteo y limpieza de variables //

if(!empty($_GET['id'])){
    $id = anti_hack('id',$_GET['id']);
}else{
    $id = '';
}

if(!empty($_GET['idC'])){
    $idC = anti_hack('idC',$_GET['idC']);
}else{
    $idC = '';
}

// eliminar datos // 

    if(!empty($id)){
        $queryFiles = "select * from ".$tabla." where ".$id_tabla." = ".$id;
        echo $id;
        $resultFiles = mysqli_query($link,$queryFiles);
        while($arrayFiles = mysqli_fetch_array($resultFiles)){
            
            $file = "../../files/files/".$arrayFiles['name'];
            $file_thumb = "../../files/files/thumbnail/".$arrayFiles['name'];
            //chmod($file, 775);
            //echo $file;
            
            echo "<img src'".$file."'>";
            if (is_file($file)) {
                unlink($file);
                unlink($file_thumb);
            }
        }
        
        $query = "DELETE FROM ".$tabla." WHERE ".$id_tabla." = ".$id;
        $result = mysqli_query($link,$query);
        
        if($result){           
            ?>
            <script>
            //cargarFiles('files','<?php echo $idC;?>','');
            //$('#resultFiles').html('<p class="small text-center">Eliminado</p>');
            cargarFiles('files',14,'');
            </script>
            <?php
        }
        
    }

?>