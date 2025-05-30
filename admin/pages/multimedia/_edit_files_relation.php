<?php
if(!empty($_GET['page'])){
    $page = $_GET['page'];
}else{
    echo "error page";
    exit();
}

if(!empty($_GET['idFoto'])){
    $idFoto = $_GET['idFoto'];
}else{
    echo "error foto";
    exit();
}

if(!empty($_GET['idArticulo'])){
    $idArticulo = $_GET['idArticulo'];
  }else{
    echo "error articulo";
    exit();
  }

$url_dir='../../';
include($url_dir.'/config/connection.php');
include($url_dir.'/config/functions.php');

$tabla = 'tab_files_relation';
$id_tabla = 'id_files_relation';

$array = querySQL("SELECT * FROM tab_files WHERE id = $idFoto");
$name = $array['name'];
$url = $array['url'];

$query = "INSERT INTO ".$tabla." (id,name,url,page,id_articulo) VALUES ('$idFoto','$name','$url','$page','$idArticulo')";
$result = mysqli_query($link,$query);

if($result){
?>
<script>
cargarDivFiles('files_relation_pages','../multimedia/_files_relation_pages','<?php echo $idFoto;?>','<?php echo $page; ?>','<?php echo $idArticulo; ?>');
</script>
<?php
}else{
    echo "error al guardar la foto";
}
?>