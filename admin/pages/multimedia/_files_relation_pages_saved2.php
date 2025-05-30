<?php
$page = 'multimedia';

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_files_relation';
$id_tabla = 'id';

if(!empty($_GET['id'])){
	$id = anti_hack('id',$_GET['id']);
}else{
	$id = '';
}

if(!empty($_GET['idArticulo'])){
    $idArticulo = anti_hack('page',$_GET['idArticulo']);
}else{
    $idArticulo = '';
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

echo $idArticulo;
echo $page;

?>
<hr>
<div class="row">
    <?php
    $sql = querySQL_while("select * from ".$tabla." where page = '".$page."' and id_articulo = ".$idArticulo." order by id_files_relation DESC");
    if($sql != 'empty'){
    foreach ($sql as $key => $array) {

    $idFilesRelation = $array['id_files_relation'];
    ?>
        
        <div class="col-md-6 col-xs-6 grid-margin text-center">
        <a href="<?php echo $array['url']; ?>" target="_blank" class="d-block img-lib">
        <div class=" ">
            <img src="<?php echo $array['url']; ?>" alt="<?php echo ($array['name']); ?>" class="img-lib-limits" />
        </div>
        </a>
        <br>
        <p class="small" style="height: 5px;"><?php echo substr($array['name'],0,50); ?></p>
        <br>
        <div id="resultFiles"></div>
        <?php if(empty($ver)){ ?>
            <a href="javascript:deleteFilesRelation('resultFiles','<?php echo $idFilesRelation; ?>','<?php echo $idArticulo;?>','<?php echo $page;?>','<?php echo $idArticulo;?>')" 
            class="small text-center d-block p-3" style="border-bottom: #e7e7e7 1px solid;">Quitar</a>
        <?php } ?>
        </div>
                 
    <?php }} ?>
</div>   
