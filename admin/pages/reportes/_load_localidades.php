<?php
include('../../config/connection.php');
include('../../config/functions.php');
// seteo y limpieza de variables //


if(!empty($_GET['idP'])){
  $idP = ($_GET['idP']);
}else{
  $idP = '';
}

if(!empty($_GET['loc'])){
  $loc = ($_GET['loc']);
}else{
  $loc = '';
}

?>

<select class="form-control" name="localidad">
  <option value="0">Localidad</option>
  <?php
  $sql = querySQL_while("SELECT * FROM tab_localidades WHERE id_provincia = $idP ORDER BY localidad ASC");
  foreach ($sql as $key => $arrayL) {

  ?>
  <option value="<?php echo $arrayL['id_localidad'];?>" <?php if($arrayL['id_localidad'] == $loc) echo 'selected="selected"'; ?>><?php echo ($arrayL['localidad']);?></option>
  <?php } ?>
</select>

