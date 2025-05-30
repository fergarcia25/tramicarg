<?php
$page = 'productos';

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_files';
$id_tabla = 'id';

if(!empty($_GET['id'])){
	$id = anti_hack('id',$_GET['id']);
}else{
	$id = '';
}

if(!empty($_GET['folder'])){
    $folder = anti_hack('folder',$_GET['folder']);
}else{
    $folder = '';
}

if(!empty($_GET['ver'])){
	$ver = anti_hack('ver',$_GET['ver']);
}else{
	$ver = '';
}

?>
<hr>
<div class="row">
    <?php
    $sql = querySQL_while("select * from ".$tabla." order by id DESC");
    if($sql != 'empty'){
    foreach ($sql as $key => $array) {
    ?>
        
        <div class="col-md-2 col-xs-6 grid-margin text-center pb-3" style="border-bottom: #e7e7e7 1px solid;">
        <a href="<?php echo $array['url']; ?>" target="_blank" class="d-block img-lib">
        <div class=" ">
            <img src="<?php echo $array['url']; ?>" alt="<?php echo ($array['name']); ?>" class="img-lib-limits" />
        </div>
        </a>
        <br>
        <p class="small" style="height: 25px;"><?php echo substr($array['name'],0,40); ?></p>
        <br>
        <div id="resultFiles"></div>
        <?php if(empty($ver)){ ?>
            <a href="javascript:confirmar<?php echo $array['id'];?>();" 
            class="small btn btn-danger btn-xs" title="Eliminar"><i class="ti-trash"></i></a>
        <?php } ?>
        </div>
        <script>
            function confirmar<?php echo $array['id'];?>()
            {
            var mensaje;
            var opcion = confirm("El archivo no podra recuperarse. ¿Desea eliminarlo de todas formas?");
            if (opcion == true) {
                //mensaje = "Has clickado OK";
                deleteFiles('_delete_files',<?php echo $array['id'];?>,'idC=<?php echo $id;?>');
            } else {
            }
        }
        </script>

    <?php }} ?>
</div>   
