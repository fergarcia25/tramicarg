<?php
$page = 'multimedia';

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

if(!empty($_GET['page'])){
    $page = anti_hack('page',$_GET['page']);
}else{
    $page = '';
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
        <p class="small" style="height: 18px;"><?php echo substr($array['name'],0,40); ?></p>
        <br>
        <div id="resultFiles"></div>
        <?php if(empty($ver)){ ?>
            <a href="javascript:editFilesRelation('resultFiles','idFoto=<?php echo ($array['id']); ?>&idArticulo=<?php echo $id;?>&page=<?php echo $page;?>');" 
            class="btn btn-success btn-xs small" style="border-bottom: #e7e7e7 1px solid;">Agregar</a>
        <?php } ?>
        </div>
                 
    <?php }} ?>
</div>   
